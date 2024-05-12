<?php

use App\Models\Sitting;
use App\Models\Url;

$sittings = Sitting::all()->first();
$url = Url::latest()->first();

?>
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>iQuick Shortner</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="{{asset('../../assets')}}/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="{{asset('../../assets')}}/vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="{{asset('../../assets')}}/vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="{{asset('../../assets')}}/vendors/font-awesome/css/font-awesome.min.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="{{asset('../../assets')}}/css/style.css">
  <link rel="stylesheet" href="{{asset('../../assets')}}/css/alerts.css">
  <!-- End layout styles -->
  <link rel="icon" type="image/x-icon" href="{{ asset('public/sittings/'.$sittings->light_favicon) }}" />

  
    @yield('style')
</head>
