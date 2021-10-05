@extends('layouts.english')

@section('title', 'About us')

@section('cssFiles')

@endsection 

@section('content')
<div id="about">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1>About us</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <h2>Who We Are</h2>
        <p>Minerva Group is one of the most significant groups of Companies based In Egypt, working in field of Travel & Tourism / Healthcare & Wellness / Therapeutic & Eco Lodge, and Economics since 1988 with a group of Specialists each in his field, gathering their various experiences in Minerva Group. The Chairman of the Group is Mr. Walid A. Ezzat with more than 38 years of experience. These companies are interconnected and create an entity managed as a single unit through divisional organization system.</p>

        <h2>Minerva Group consists of 5 Divisions:</h2>
        <ul>
          <li>Minerva Travel & Tours</li>
          <li>Minerva Healthcare & Wellness</li>
          <li>Egytat for Economics & Tourism</li>
          <li>Shanda Eco Desert Lodge</li>
          <li>Safari Misr for Hotel Management</li>
        </ul>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12">
        <p><b>Minerva Travel & Tours</b> under supervision of Mrs. Nesreen Moustafa with more than 25 years of experience. Vice Chairman for Tourism.</p>
        <p><b>Minerva Healthcare & wellness</b> under Supervision of Dr . Ahmad Refaat with more than 35 years of experience. Vice Chairman for Healthcare & Wellness Tourism.</p>
        <p><b>Egytat For Economics & Tourism</b> under Supervision of Mrs . Sahar Niazy with more than 25 years of experience. Vice Chairman for Economics.</p>
        <p><b>Shanda Eco Desert Lodge</b> under Supervision of General Mohsen Galal with more than 40 years of experience. General Manager.</p>
        <p><b>Safari Misr For Hotel Management</b> under Supervision of General Yassen El Kahly with more than 45 years of experience. General manager.</p>
      </div>
    </div>
  </div>
</div>
<div id="team">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-12">
        <h1>Our Team</h1>
      </div>
    </div>
    <div class="row justify-content-md-center text-center">
      <div class="col-lg-4">
        <div class="stuff-img">
          <img class="w-100" src="{{asset('images/walid_ezzat.jpg')}}">
        </div>
        <div class="stuff-name">
          <h2>Mr. Walid Ezzat</h2>
          <p><strong>CHAIRMAN OF MINERVA GROUP</strong></p>
        </div>
        <!--<div class="stuff-details">
          <p>Our clinic's Chief Medical Officer, Dr. Mark Hoffman has been working in this field of medical specialization since 2002. After founding his own clinic in 2010 he brought all his experience here.</p>
          <p>Most of all he loves to see you walk out with a bright wide smile!</p>
        </div>-->
      </div>
    </div>
    <div class="row text-center">
      <div class="col-lg-3">
        <div class="stuff-img">
          <img class="w-100" src="{{asset('images/ahmad_refaat.jpg')}}">
        </div>
        <div class="stuff-name">
          <h2>Dr. Ahmad Refaat, MD</h2>
          <p><strong>Vice Chairman for Healthcare & Wellness Tourism</strong></p>
        </div>
        
      </div>
      <div class="col-lg-3">
        <div class="stuff-img">
          <img class="w-100" src="{{asset('images/nesreen_moustafa.jpg')}}">
        </div>
        <div class="stuff-name">
          <h2>Mrs. Nesreen Moustafa</h2>
          <p><strong>Vice Chairman for Tourism</strong></p>
        </div>
        
      </div>
      <div class="col-lg-3">
        <div class="stuff-img">
          <img class="w-100" src="{{asset('images/sahar_niazy.jpg')}}">
        </div>
        <div class="stuff-name">
          <h2>Mrs. Sahar Niazy</h2>
          <p><strong>Vice Chairman for Economics</strong></p>
        </div>
        
      </div>
      <div class="col-lg-3">
        <div class="stuff-img">
          <img class="w-100" src="{{asset('images/mohsen_galal.jpg')}}">
        </div>
        <div class="stuff-name">
          <h2>General. Mohsen Galal</h2>
          <p><strong>General Manager Shanda Eco Desert Lodge</strong></p>
        </div>
        
      </div>
    </div>
  </div>
</div>
@endsection

@section('jsFiles')

@endsection