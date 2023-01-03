@extends('layout')
@section('students')
<h1>Öğrenci Güncelle</h1>
<form action="{{route('ogrenci.guncelle',['sid'=>$student->sid])}}" method="post">
    @csrf
    <div class="list">
      <ul>
        <li class="item-content item-input item-input-outline">
            <div class="item-inner">
                <div class="item-title item-label margin-bottom-half">No</div>
                <div class="item-input-wrap">
                    <input type="number" name="sid" id="sid" value="{{$student->sid}}"/>
                </div>
            </div>
        </li>
        <li class="item-content item-input item-input-outline">
            <div class="item-inner">
                <div class="item-title item-label margin-bottom-half">İsim</div>
                <div class="item-input-wrap">
                    <input type="text" name="fname" id="fname" value="{{$student->fname}}"/>
                    <span class="input-clear-button"></span>
                </div>
            </div>
        </li>
        <li class="item-content item-input item-input-outline">
            <div class="item-inner">
                <div class="item-title item-label margin-bottom-half">Soyisim</div>
                <div class="item-input-wrap">
                    <input type="text" name="lname" id="lname" value="{{$student->lname}}"/>
                    <span class="input-clear-button"></span>
                </div>
            </div>
        </li>
        <li class="item-content item-input item-input-outline">
            <div class="item-inner">
                <div class="item-title item-label margin-bottom-half">Doğum Yeri</div>
                <div class="item-input-wrap">
                    <input type="text" name="birthplace" id="birthplace" value="{{$student->birthplace}}"/>
                    <span class="input-clear-button"></span>
                </div>
            </div>
        </li>
        <li class="item-content item-input item-input-outline">
            <div class="item-inner">
                <div class="item-title item-label margin-bottom-half">Doğum Yeri</div>
                <div class="item-input-wrap">                    
                    <input type="date" name="birthDate" id="birthDate" value="{{$student->birthDate}}"/>
                </div>
            </div>
        </li>
        <li class="item-content item-input margin-top">
            <div class="item-inner">                
                <div class="item-input-wrap">
                    <input type="submit" class="button button-fill" value="Güncelle"/>
                </div>
            </div>
        </li>
      </ul>
    </div>
</form>
@endsection('students')