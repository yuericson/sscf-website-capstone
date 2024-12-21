<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaction;
use App\Models\BeginningBalance;
use App\Models\Total;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AuditorController extends Controller
{
    public function indexBeginningBalances()
    {
        $beginningBalances = BeginningBalance::orderBy('year', 'desc')->paginate(10);
        $transactions = Transaction::orderBy('date', 'desc')->paginate(10); // Kung kinakailangan
        return view('Dashboard.beginning-balances', [
            'beginningBalances' => $beginningBalances,
        ]);
    }

    /**
     * I-display ang lahat ng Totals.
     */
    public function indexTotals()
    {
        $totals = Total::orderBy('year', 'desc')->paginate(10);

        return view('Dashboard.totals', [
            'totals' => $totals,
        ]);
    }

    /**
     * I-display ang Auditor Dashboard.
     */
    public function dashboardIndex()
    {
        $currentYear = now()->year;

        // Kunin ang beginning balance para sa kasalukuyang taon
        $beginningBalance = BeginningBalance::where('year', $currentYear)->first();

        // Kalkulahin ang total inflows at outflows mula sa lahat ng transactions
        $totalInflows = Transaction::where('type', 'inflow')->sum('amount');
        $totalOutflows = Transaction::where('type', 'outflow')->sum('amount');

        // Kalkulahin ang current funds
        $currentFunds = $totalInflows - $totalOutflows;

        // Kalkulahin ang ending cash on hand
        $endingCashOnHand = ($beginningBalance->amount ?? 0) + $currentFunds;

        // Ihanda ang monthly inflows at outflows para sa kasalukuyang taon
        $monthlyInflows = [];
        $monthlyOutflows = [];

        for ($month = 1; $month <= 12; $month++) {
            $monthlyInflows[$month] = Transaction::where('type', 'inflow')
                ->whereYear('date', $currentYear)
                ->whereMonth('date', $month)
                ->sum('amount');

            $monthlyOutflows[$month] = Transaction::where('type', 'outflow')
                ->whereYear('date', $currentYear)
                ->whereMonth('date', $month)
                ->sum('amount');
        }

        // Kalkulahin ang totals sa totals table
        $totalRecord = Total::where('year', $currentYear)->first();

        if (!$totalRecord) {
            // Kung wala pang record, gumawa ng bago
            $totalRecord = Total::create([
                'year' => $currentYear,
                'total_inflows' => $totalInflows,
                'total_outflows' => $totalOutflows,
                'current_funds' => $currentFunds,
                'ending_cash_on_hand' => $endingCashOnHand,
            ]);
        } else {
            // Kung mayroon na, i-update ito
            $totalRecord->update([
                'total_inflows' => $totalInflows,
                'total_outflows' => $totalOutflows,
                'current_funds' => $currentFunds,
                'ending_cash_on_hand' => $endingCashOnHand,
            ]);
        }

        // Kunin ang mga transactions na may pagination (10 kada pahina)
        $transactions = Transaction::orderBy('date', 'desc')->paginate(10);

        // Kunin ang lahat ng totals na may pagination (10 kada pahina)
        $totals = Total::orderBy('year', 'desc')->paginate(10);

        // Kunin ang lahat ng beginning balances na may pagination (10 kada pahina)
        $beginningBalances = BeginningBalance::orderBy('year', 'desc')->paginate(10);

        // I-pasa ang data sa view
        return view('Dashboard.auditor-db', [
            'totalInflows'      => $totalInflows,
            'totalOutflows'     => $totalOutflows,
            'currentFunds'      => $currentFunds,
            'beginningBalance'  => $beginningBalance->amount ?? 0,
            'endingCashOnHand'  => $endingCashOnHand,
            'monthlyInflows'    => $monthlyInflows,
            'monthlyOutflows'   => $monthlyOutflows,
            'transactions'      => $transactions,
            'totals'            => $totals,
            'beginningBalances' => $beginningBalances,
        ]);
    }

    /**
     * Mag-store ng bagong transaction.
     */
    public function storeTransaction(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date'        => 'required|date',
            'description' => 'required|string|max:255',
            'amount'      => 'required|numeric|min:0',
            'type'        => 'required|in:inflow,outflow',
            'care_of'     => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Failed to add transaction. Please check your inputs.');
        }

        try {
            DB::beginTransaction();

            $data = $request->only(['date', 'description', 'amount', 'type', 'care_of']);
            // Itakda ang debit at credit batay sa uri ng transaction
            if ($data['type'] === 'inflow') {
                $data['debit'] = $data['amount'];
                $data['credit'] = 0;
            } else {
                $data['debit'] = 0;
                $data['credit'] = $data['amount'];
            }

            Transaction::create($data);

            // Kalkulahin muli ang totals...
            $currentYear = now()->year;
            $totalInflows = Transaction::where('type', 'inflow')->sum('amount');
            $totalOutflows = Transaction::where('type', 'outflow')->sum('amount');
            $currentFunds = $totalInflows - $totalOutflows;
            $beginningBalance = BeginningBalance::where('year', $currentYear)->first();
            $endingCashOnHand = ($beginningBalance->amount ?? 0) + $currentFunds;

            $totalRecord = Total::where('year', $currentYear)->first();
            if (!$totalRecord) {
                $totalRecord = Total::create([
                    'year' => $currentYear,
                    'total_inflows' => $totalInflows,
                    'total_outflows' => $totalOutflows,
                    'current_funds' => $currentFunds,
                    'ending_cash_on_hand' => $endingCashOnHand,
                ]);
            } else {
                $totalRecord->update([
                    'total_inflows' => $totalInflows,
                    'total_outflows' => $totalOutflows,
                    'current_funds' => $currentFunds,
                    'ending_cash_on_hand' => $endingCashOnHand,
                ]);
            }
            DB::commit();

            return redirect()->back()->with('success', 'Transaction added successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error storing transaction: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while adding the transaction.');
        }
    }

    /**
     * I-update ang isang existing na transaction.
     */
    public function updateTransaction(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'date'        => 'required|date',
            'description' => 'required|string|max:255',
            'amount'      => 'required|numeric|min:0',
            'type'        => 'required|in:inflow,outflow',
            'care_of'     => 'nullable|string|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Failed to update transaction. Please check your inputs.');
        }

        try {
            DB::beginTransaction();
            $transaction = Transaction::findOrFail($id);
            $data = $request->only(['date', 'description', 'amount', 'type', 'care_of']);
            // Itakda ang debit at credit batay sa uri ng transaction
            if ($data['type'] === 'inflow') {
                $data['debit'] = $data['amount'];
                $data['credit'] = 0;
            } else {
                $data['debit'] = 0;
                $data['credit'] = $data['amount'];
            }

            $transaction->update($data);

            // Kalkulahin muli ang totals...
            $currentYear = now()->year;
            $totalInflows = Transaction::where('type', 'inflow')->sum('amount');
            $totalOutflows = Transaction::where('type', 'outflow')->sum('amount');
            $currentFunds = $totalInflows - $totalOutflows;
            $beginningBalance = BeginningBalance::where('year', $currentYear)->first();
            $endingCashOnHand = ($beginningBalance->amount ?? 0) + $currentFunds;

            $totalRecord = Total::where('year', $currentYear)->first();
            if (!$totalRecord) {
                $totalRecord = Total::create([
                    'year' => $currentYear,
                    'total_inflows' => $totalInflows,
                    'total_outflows' => $totalOutflows,
                    'current_funds' => $currentFunds,
                    'ending_cash_on_hand' => $endingCashOnHand,
                ]);
            } else {
                $totalRecord->update([
                    'total_inflows' => $totalInflows,
                    'total_outflows' => $totalOutflows,
                    'current_funds' => $currentFunds,
                    'ending_cash_on_hand' => $endingCashOnHand,
                ]);
            }
            DB::commit();

            return redirect()->back()->with('success', 'Transaction updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error updating transaction: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while updating the transaction.');
        }
    }

    /**
     * I-delete ang isang specific na transaction.
     */
    public function destroyTransaction($id)
    {
        try {
            DB::beginTransaction();
            $transaction = Transaction::findOrFail($id);
            $transaction->delete();

            // Kalkulahin muli ang totals...
            $currentYear = now()->year;
            $totalInflows = Transaction::where('type', 'inflow')->sum('amount');
            $totalOutflows = Transaction::where('type', 'outflow')->sum('amount');
            $currentFunds = $totalInflows - $totalOutflows;
            $beginningBalance = BeginningBalance::where('year', $currentYear)->first();
            $endingCashOnHand = ($beginningBalance->amount ?? 0) + $currentFunds;

            $totalRecord = Total::where('year', $currentYear)->first();
            if (!$totalRecord) {
                $totalRecord = Total::create([
                    'year' => $currentYear,
                    'total_inflows' => $totalInflows,
                    'total_outflows' => $totalOutflows,
                    'current_funds' => $currentFunds,
                    'ending_cash_on_hand' => $endingCashOnHand,
                ]);
            } else {
                $totalRecord->update([
                    'total_inflows' => $totalInflows,
                    'total_outflows' => $totalOutflows,
                    'current_funds' => $currentFunds,
                    'ending_cash_on_hand' => $endingCashOnHand,
                ]);
            }
            DB::commit();

            return redirect()->back()->with('success', 'Transaction deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error deleting transaction: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while deleting the transaction.');
        }
    }

    /**
     * Mag-store ng bagong Totals.
     */
    public function storeTotal(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'year' => 'required|digits:4|integer|unique:totals,year',
            'total_inflows' => 'required|numeric|min:0',
            'total_outflows' => 'required|numeric|min:0',
            'current_funds' => 'required|numeric',
            'ending_cash_on_hand' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Failed to add totals. Please check your inputs.');
        }

        try {
            DB::beginTransaction();
            Total::create($request->only(['year', 'total_inflows', 'total_outflows', 'current_funds', 'ending_cash_on_hand']));
            DB::commit();

            return redirect()->back()->with('success', 'Totals added successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error storing totals: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while adding the totals.');
        }
    }

    /**
     * I-update ang isang existing na Totals.
     */
    public function updateTotal(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'year' => 'required|digits:4|integer|unique:totals,year,'.$id,
            'total_inflows' => 'required|numeric|min:0',
            'total_outflows' => 'required|numeric|min:0',
            'current_funds' => 'required|numeric',
            'ending_cash_on_hand' => 'required|numeric',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Failed to update totals. Please check your inputs.');
        }

        try {
            DB::beginTransaction();
            $total = Total::findOrFail($id);
            $total->update($request->only(['year', 'total_inflows', 'total_outflows', 'current_funds', 'ending_cash_on_hand']));
            DB::commit();

            return redirect()->back()->with('success', 'Totals updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error updating totals: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while updating the totals.');
        }
    }

    /**
     * I-delete ang isang specific na Totals.
     */
    public function destroyTotal($id)
    {
        try {
            DB::beginTransaction();
            $total = Total::findOrFail($id);
            $total->delete();
            DB::commit();

            return redirect()->back()->with('success', 'Totals deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error deleting totals: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while deleting the totals.');
        }
    }

    /**
     * Mag-store ng bagong Beginning Balance.
     */
    public function storeBeginningBalance(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'year' => 'required|digits:4|integer|unique:beginning_balances,year',
            'amount' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Failed to add beginning balance. Please check your inputs.');
        }

        try {
            DB::beginTransaction();
            BeginningBalance::create($request->only(['year', 'amount']));
            DB::commit();

            return redirect()->back()->with('success', 'Beginning balance added successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error storing beginning balance: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while adding the beginning balance.');
        }
    }

    /**
     * I-update ang isang existing na Beginning Balance.
     */
    public function updateBeginningBalance(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'year' => 'required|digits:4|integer|unique:beginning_balances,year,'.$id,
            'amount' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput()
                ->with('error', 'Failed to update beginning balance. Please check your inputs.');
        }

        try {
            DB::beginTransaction();
            $balance = BeginningBalance::findOrFail($id);
            $balance->update($request->only(['year', 'amount']));
            DB::commit();

            return redirect()->back()->with('success', 'Beginning balance updated successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error updating beginning balance: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while updating the beginning balance.');
        }
    }

    /**
     * I-delete ang isang specific na Beginning Balance.
     */
    public function destroyBeginningBalance($id)
    {
        try {
            DB::beginTransaction();
            $balance = BeginningBalance::findOrFail($id);
            $balance->delete();
            DB::commit();

            return redirect()->back()->with('success', 'Beginning balance deleted successfully.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error deleting beginning balance: ' . $e->getMessage());
            return redirect()->back()->with('error', 'An error occurred while deleting the beginning balance.');
        }
    }
}
    