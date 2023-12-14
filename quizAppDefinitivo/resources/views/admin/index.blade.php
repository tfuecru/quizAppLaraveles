<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>QuizMaster</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ url('assets/img/favicon.png') }}" rel="icon">
  <link href="{{ url('assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ url('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ url('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ url('assets/vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ url('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet">
  <link href="{{ url('assets/vendor/quill/quill.bubble.css') }}" rel="stylesheet">
  <link href="{{ url('assets/vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ url('assets/vendor/simple-datatables/style.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ url('assets/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Nov 17 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="{{ url('assets/img/logo.png') }}" alt="">
        <span class="d-none d-lg-block">QuizMaster</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto">
     
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('admin') }}">
          <i class="bi bi-patch-question"></i>
          <span>Ver preguntas</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link collapsed" href="{{ url('admin/create') }}">
          <i class="bi bi-patch-question"></i>
          <span>Crear preguntas</span>
        </a>
      </li>
    </ul>

  </aside><!-- End Sidebar-->
  
  

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Quiz</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item active">QuizMaster / Ver preguntas</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">   
        <div class="table-responsive small">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Pregunta</th>
          <th scope="col">Respuestas posibles</th>
          <th scope="col">Respuesta correcta</th>
          <th scope="col"></th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
          
        @foreach($preguntas as $pregunta)
    <tr>
        <td>{{ $pregunta->id }}</td>
        <td>{{ $pregunta->pregunta }}</td>
        <td>
            {{--@foreach($respuestas as $respuesta)
                @if($respuesta->idpregunta == $pregunta->id)
                    <p>{{ $respuesta->respuesta }}</p>
                @endif
            @endforeach--}}
            @php
            $correcta = 'no sé';
            @endphp
            @foreach($pregunta->respuestas as $respuesta)
              <p>{{ $respuesta->respuesta }}</p>
              @php
              if($respuesta->escorrecta) {
                $correcta = $respuesta;
              }
              @endphp
            @endforeach
        </td>
        <td>
            {{$correcta->respuesta}}
            {{--@php
                $respuestaCorrecta = null;
                foreach($respuestas as $respuesta) {
                    if($respuesta->idpregunta == $pregunta->id && $respuesta->escorrecta) {
                        $respuestaCorrecta = $respuesta->respuesta;
                        break;
                    }
                }
            @endphp

            @if($respuestaCorrecta)
                {{ $respuestaCorrecta }}
            @endif--}}
        </td>
        <td>
            <a class="btn-danger btn" href="{{ route('admin.preguntas.edit', $pregunta->id) }}"><i class="bi bi-pencil-square"></i></a>
            
        </td>
        <td>
            <form data-pregunta="{{ $pregunta->pregunta }}" class="formDelete" action="{{ route('admin.preguntas.destroy', $pregunta->id) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-warning"><i class="bi bi-trash"></i></button>
                                </form>
        </td>
    </tr>
@endforeach




      </tbody>
    </table>
    </section>
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>QuizMaster</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      <!-- All the links in the footer should remain intact. -->
      <!-- You can delete the links only if you purchased the pro version. -->
      <!-- Licensing information: https://bootstrapmade.com/license/ -->
      <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/ -->
      Designed by <a href="#">crxxz2004</a>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ url('assets/vendor/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ url('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ url('assets/vendor/chart.js/chart.umd.js') }}"></script>
  <script src="{{ url('assets/vendor/echarts/echarts.min.js') }}"></script>
  <script src="{{ url('assets/vendor/quill/quill.min.js') }}"></script>
  <script src="{{ url('assets/vendor/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ url('assets/vendor/tinymce/tinymce.min.js') }}"></script>
  <script src="{{ url('assets/vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ url('assets/js/main.js') }}"></script>
  <script>
  //solucion 1
  const forms = document.querySelectorAll(".formDelete");
  forms.forEach(function(form) {
      form.onsubmit = (event) => {
        return confirm('Seguro que quieres borrar ' + event.target.dataset.pregunta + '?');
      };
  });
  </script>

</body>

</html>