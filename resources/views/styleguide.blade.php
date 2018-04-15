<?php
    /**
    * Variables
    *
    * @var $categories           @type [{}]      @mean All categories
    * @var $category->name       @type String    @mean Name of category
    */

    $currentPage = [
        'title' => 'Project',
        'bodyClass' => 'project'
    ];
?>
@extends('layouts.app')
{{----------------
    HEADER
----------------}}
@section('main-header')

@endsection
{{----------------
    CONTENT
----------------}}
@section('content')
<section class="container">
  {{----------------  Typographie  ----------------}}
  <section id="Typographie">
    <h2 class="h1">Typographie</h2>

      <h1 class="h1">.h1</h1>
      <h2 class="h2">.h2</h2>
      <h3 class="h3">.h3</h3>
      <h4 class="h4">.h4</h4>
      <p>paragraphe</p>
      <p><small>paragraphe small</small></p>
      <a href="#">link</a>
      <ul class="list">
        <li class="list__item">ul</li>
        <li class="list__item">li</li>
      </ul>
      <ol class="list">
        <li class="list__item">ol</li>
        <li class="list__item">li</li>
      </ol>
      <span>span</span>
    </section>
    <hr>
    {{----------------  CLASSES  ----------------}}
    <section id="Classes">
      <h2 class="h1">Classes utiles</h2>

      <article>
        <h2 class="h2">Colors</h2>
        <span class="bg-primary">.bg-primary</span>
        <span class="bg-secondary">.bg-secondary</span>
        <span class="primary">.primary</span>
        <span class="secondary">.secondary</span>
      </article>
      {{-- CENTER --}}
      <article>
        <h2 class="h2">Center</h2>

        {{-- Absolute --}}
        <h3 class="h3">Center absolute</h3>
        <div style="width:100px; height:100px; border:1px solid black; position:relative;">
          <span class="a-x">.a-x</span>
          <span style="width: 500px; position: absolute; left: 110px; top: 41%;">ou dans le scss : <b style="font-weight:bold;">@extend %a-x;</b> </span>
        </div>
        <div style="width:100px; height:100px; border:1px solid black; position:relative;">
          <span class="a-y">.a-y</span>
          <span style="width: 500px; position: absolute; left: 110px; top: 41%;">ou dans le scss : <b style="font-weight:bold;">@extend %a-y;</b> </span>
        </div>
        <div style="width:100px; height:100px; border:1px solid black; position:relative;">
          <span class="a-xy">.a-xy</span>
          <span style="width: 500px; position: absolute; left: 110px; top: 41%;">ou dans le scss : <b style="font-weight:bold;">@extend %a-xy;</b> </span>
        </div>

        {{-- Flex --}}
        <h3 class="h3">Center Flex</h3>
        <div style="width:100px; height:100px; border:1px solid black; position:relative;" class="f-x">
          <span>.f-x</span>
          <span style="width: 500px; position: absolute; left: 110px; top: 41%;">ou dans le scss : <b style="font-weight:bold;">@extend %f-x;</b> </span>
        </div>
        <div style="width:100px; height:100px; border:1px solid black; position:relative;" class="f-y">
          <span>.f-y</span>
          <span style="width: 500px; position: absolute; left: 110px; top: 41%;">ou dans le scss : <b style="font-weight:bold;">@extend %f-y;</b> </span>
        </div>
        <div style="width:100px; height:100px; border:1px solid black; position:relative;" class="f-xy">
          <span>.f-xy</span>
          <span style="width: 500px; position: absolute; left: 110px; top: 41%;">ou dans le scss : <b style="font-weight:bold;">@extend %f-xy;</b> </span>
        </div>

        {{-- Block --}}
        <h3 class="h3">Center Block</h3>
        <div style="width:100px; height:100px; border:1px solid black; position:relative;">
          <span class="a-x">.a-x</span>
          <span style="width: 500px; position: absolute; left: 110px; top: 41%;">ou dans le scss : <b style="font-weight:bold;">@extend %a-x;</b> </span>
        </div>
      </article>
    </section>
    <hr>
    {{----------------  BUTTONS  ----------------}}
    <section id="Buttons">
      <h2 class="h1">Buttons</h2>

      <span class="btn btn--primary" tabindex="0">.btn.btn--primary</span>
      <span class="btn btn--secondary" tabindex="0">.btn.btn--secondary</span>
    </section>
    <hr>
    {{----------------  Forms  ----------------}}
    <section id="Formulaire">
      <h2 class="h1">Formulaire</h2>

      <form>
        {{-- Input --}}
        <div class="form-group">
          <label for="text1">input text</label>
          <input type="text" id="text1">
        </div>
        <div class="form-group">        
          <label for="text1placeholder">input text placeholder</label>
          <input type="text" id="text1placeholder" placeholder="placeholder">
        </div>
        <div class="form-group">          
          <label for="text1disabled">input text disabled</label>
          <input type="text" id="text1disabled" disabled>
        </div>

        {{-- Textarea --}}
        <div class="form-group">        
          <label for="area1">textarea</label>
          <textarea name="area1" id="area1"></textarea>
        </div>

        {{-- Select --}}
        <select name="sel1" id="sel1">
          <option value="Select1">option</option>
          <option value="Select2">option</option>
        </select>
        <select name="sel2" id="sel2">
          <option value="Select1">option</option>
          <option value="Select2" disabled>option disabled</option>
        </select>
        <select name="sel3" id="sel3" disabled>
          <option value="Select1">select disabled</option>
          <option value="Select2">option</option>
        </select>

        {{-- Submit --}}
        <div class="form-group">          
          <input type="submit" id="submit1" value="submit">
        </div>
        <div class="form-group">          
          <input type="submit" id="submit1disabled" disabled value="submit disabled">
        </div>
      </form>
    </section>
    <hr>
    {{----------------  CARD  ----------------}}
    <section id="Card">
      <h2 class="h1">Card</h2>
      {{-- Card Projects --}}
      <h3 class="h2">Card Projects</h3>
      @cardProject( [
        'imageUrl' => 'profils/avatar-default.png',
        'alt'      => 'image du projet',
        'title'    => 'Prismashop',
        'team'     => 'Wexperience',
        'link'     => '#',
      ])
      @endcardProject

      {{-- Card Tasks --}}
      <h3 class="h2">Card Tasks</h3>
      <div class="card-container">
        {{-- high priority --}}
        @cardTask( [
          'title'      => 'Design homepage',
          'priority'   => 'high',
          'link'       => '#',
          'imageUrl'   => 'profils/avatar-default.png',
          'alt'        => 'photo de profil de USER',
          'nameWorker' => 'Maxime Jacquet',
          'deadline'   => '30 avril 2018',
        ])
        @endcardTask

        {{-- low priority --}}
        @cardTask( [
          'title'      => 'Audit SEO',
          'priority'   => 'low',
          'link'       => '#',
          'imageUrl'   => 'profils/avatar-default.png',
          'alt'        => 'photo de profil de USER',
          'nameWorker' => 'Vincent Battez',
          'deadline'   => '23 mai 2018',
        ])
        @endcardTask
    </div>
    </section>
    <hr>
</section>
@endsection