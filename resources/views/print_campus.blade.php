<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <title>Print - {{ $campus }}</title>
   <style>
     /* Basic styling para sa print layout */
     table { width: 100%; border-collapse: collapse; }
     th, td { border: 1px solid #000; padding: 8px; text-align: left; }
     h2 { text-align: center; }
   </style>
</head>
<body>
    <h2>Registrations for {{ $campus }}</h2>
    <table>
         <thead>
            <tr>
               <th>ID</th>
               <th>Full Name</th>
               <th>Age</th>
               <th>Sex</th>
               <th>Year Level</th>
               <th>Course</th>
               <th>College/Campus</th>
               <th>Sports Event</th>
               <th>ID Number</th>
            </tr>
         </thead>
         <tbody>
           @foreach($registrations as $registration)
           <tr>
               <td>{{ $registration->id }}</td>
               <td>{{ $registration->full_name }}</td>
               <td>{{ $registration->age }}</td>
               <td>{{ $registration->gender }}</td>
               <td>{{ $registration->year_level }}</td>
               <td>{{ $registration->course }}</td>
               <td>{{ $registration->college_campus }}</td>
               <td>{{ $registration->sports_event }}</td>
               <td>{{ $registration->id_number }}</td>
           </tr>
           @endforeach
         </tbody>
    </table>
    <script>
      window.onload = function() {
         window.print();
      }
    </script>
</body>
</html>
