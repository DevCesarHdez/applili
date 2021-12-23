<!-- Required meta tags 
-------------------------------------------------->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<!-- momentJS 
-------------------------------------------------->    
<script src="https://cdn.jsdelivr.net/npm/moment@2.24.0/min/moment.min.js"></script>

<!-- JQuery 
-------------------------------------------------->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<?php if (current_url(true)->getSegment(1) == 'calendario'): ?>
  <!-- FullCalendar 
  -------------------------------------------------->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@5.4.0/main.min.css">
  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.4.0/main.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/fullcalendar@5.4.0/locales-all.min.js"></script>
<?php endif; ?>

<!-- datetimepicker CSS 
-------------------------------------------------->
<link rel="stylesheet" href="https://datetimepickerplugin.dcesarhernandez.repl.co/jquery.datetimepicker.css">

<!-- FontAwesome 
-------------------------------------------------->
<link href='https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.13.1/css/all.css' rel='stylesheet'>

<!-- Bootstrap CSS 
-------------------------------------------------->
<link rel="stylesheet" href="https://bootswatch.com/4/cyborg/bootstrap.min.css">

<!-- Style CSS 
-------------------------------------------------->
<link rel="stylesheet" href="<?= base_url('css/style.css'); ?>">