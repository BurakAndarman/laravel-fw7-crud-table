@extends('layout')
@section('students')
<h1>Öğrenci Listesi</h1>
<div class="card data-table">
  <table>
    <thead>
      <tr>
        <div class="margin-left margin-bottom">
            <a href="{{route('ogrenci.yeni')}}" class="link external icon-only">
                <i class="icon f7-icons">plus</i>
            </a>
            <a href="{{route('ogrenci.listele',['column' => $column,'sort' => $sort])}}" class="link external icon-only margin-left" style="visibility:{{$filter ? 'visible' : 'hidden'}};">
                <i class="icon f7-icons">return</i>
            </a>
        </div>
      </tr>
      <tr>
       <form action="{{route('ogrenci.ara',['column'=> $column , 'sort'=>$sort])}}" method="get">
            @csrf
            <th class="input-cell">
                <h2 class="table-head-label"><a href="{{!$filter ? 
                                                        route('ogrenci.listele',['column' => 'sid','sort' => ($sort=='asc' ? 'desc':'asc'),'page'=>$students->currentPage()]) :
                                                        route('ogrenci.ara',['column' => 'sid','sort' => ($sort=='asc' ? 'desc':'asc'),'sid'=>$sid,'fname'=>$fname,'lname'=>$lname,'birthplace'=>$birthplace,'birthDate'=>$birthDate,'page'=>$students->currentPage()])}}" class="link external">No</a></h2>
                <div class="input margin-top">
                    <input type="number" id="sid" name="sid" placeholder="No gir"  value="{{$filter ? $sid : ''}}"/>
                </div>
            </th>
            <th class="input-cell">
                <h2 class="table-head-label"><a href="{{!$filter ? 
                                                        route('ogrenci.listele',['column' => 'fname','sort' => ($sort=='asc' ? 'desc':'asc'),'page'=>$students->currentPage()]) :
                                                        route('ogrenci.ara',['column' => 'fname','sort' => ($sort=='asc' ? 'desc':'asc'),'sid'=>$sid,'fname'=>$fname,'lname'=>$lname,'birthplace'=>$birthplace,'birthDate'=>$birthDate,'page'=>$students->currentPage()])}}" class="link external">İsim</a></h2>
                <div class="input margin-top">
                    <input type="text" id="fname" name="fname" placeholder="İsim gir"  value="{{$filter ? $fname : ''}}"/>
                </div>
            </th>
            <th class="input-cell">
                <h2 class="table-head-label"><a href="{{!$filter ? 
                                                        route('ogrenci.listele',['column' => 'lname','sort' => ($sort=='asc' ? 'desc':'asc'),'page'=>$students->currentPage()]) :
                                                        route('ogrenci.ara',['column' => 'lname','sort' => ($sort=='asc' ? 'desc':'asc'),'sid'=>$sid,'fname'=>$fname,'lname'=>$lname,'birthplace'=>$birthplace,'birthDate'=>$birthDate,'page'=>$students->currentPage()])}}" class="link external">Soyisim</a></h2>
                <div class="input margin-top">
                    <input type="text" id="lname" name="lname" placeholder="Soyisim gir"  value="{{$filter ? $lname : ''}}"/>
                </div>
            </th>
            <th class="input-cell">
                <h2 class="table-head-label"><a  href="{{!$filter ? 
                                                        route('ogrenci.listele',['column' => 'birthplace','sort' => ($sort=='asc' ? 'desc':'asc'),'page'=>$students->currentPage()]) :
                                                        route('ogrenci.ara',['column' => 'birthplace','sort' => ($sort=='asc' ? 'desc':'asc'),'sid'=>$sid,'fname'=>$fname,'lname'=>$lname,'birthplace'=>$birthplace,'birthDate'=>$birthDate,'page'=>$students->currentPage()])}}" class="link external">Doğum Yeri</a></h2>
                <div class="input margin-top">
                    <input type="text" id="birthplace" name="birthplace" placeholder="Doğum yeri gir"  value="{{$filter ? $birthplace : ''}}"/>
                </div>
            </th>
            <th class="input-cell">
                <h2 class="table-head-label"><a  href="{{!$filter? 
                                                        route('ogrenci.listele',['column' => 'birthDate','sort' => ($sort=='asc' ? 'desc':'asc'),'page'=>$students->currentPage()]) :
                                                        route('ogrenci.ara',['column' => 'birthDate','sort' => ($sort=='asc' ? 'desc':'asc'),'sid'=>$sid,'fname'=>$fname,'lname'=>$lname,'birthplace'=>$birthplace,'birthDate'=>$birthDate,'page'=>$students->currentPage()])}}" class="link external">Doğum Tarihi</a></h2>
                <div class="input margin-top">
                    <input type="text" id="birthDate" name="birthDate" placeholder="Doğum tarihi gir"  value="{{$filter ? $birthDate : ''}}"/>
                </div>
            </th>
            <th>
                <input type="submit" class="button icon f7-icons search-button" value="search"/>
            </th>
       </form>      
      </tr>
    </thead>
    <tbody>
      @foreach($students as $student)
        <tr>
            <td class="numeric-cell text-align-left">{{$student->sid}}</td>
            <td class="label-cell">{{$student->fname}}</td>
            <td class="label-cell">{{$student->lname}}</td>
            <td class="label-cell">{{$student->birthplace}}</td>
            <td class="label-cell">{{$student->birthDate}}</td>
            <td class="actions-cell"> 
                <a href="{{route('ogrenci.duzenle',['sid'=>$student->sid])}}" class="link external icon-only"><i class="icon f7-icons color-blue">square_pencil</i></a>
                <a href="{{route('ogrenci.sil',['sid'=>$student->sid])}}" class="link external icon-only"><i class="icon f7-icons color-blue">trash</i></a>
            </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  <div class="data-table-footer">
        @if($students->currentPage()>1)
            <a href="{{$students->url(1)}}" class="link external"><i class="icon f7-icons page-links">chevron_left_2</i></a>
            <a href="{{$students->previousPageUrl()}}" class="link external"><i class="f7-icons margin-right-half page-links">chevron_left</i></a>
        @endif

        @if(1>$students->currentPage()-3)
            @for($i=1;$i<$students->currentPage();$i++)
                <a href="{{$students->url($i)}}" class="link external page-number">{{$i}}</a>
            @endfor
        @else
            @for($i=$students->currentPage()-3;$i<$students->currentPage();$i++)
                <a href="{{$students->url($i)}}" class="link external page-number">{{$i}}</a>
            @endfor
        @endif

        <a href="{{$students->url($students->currentPage())}}" class="link external current-page page-number">{{$students->currentPage()}}</a>

        @if($students->lastPage()<$students->currentPage()+3)
            @for($i=$students->currentPage()+1;$i<=$students->lastPage();$i++)
                <a href="{{$students->url($i)}}" class="link external page-number">{{$i}}</a>
            @endfor
        @else
            @for($i=$students->currentPage()+1;$i<=$students->currentPage()+3;$i++)
                <a href="{{$students->url($i)}}" class="link external page-number">{{$i}}</a>
            @endfor
        @endif

        @if($students->lastPage()>$students->currentPage())
            <a href="{{$students->nextPageUrl()}}" class="link external"><i class="icon f7-icons margin-left-half page-links">chevron_right</i></a>
            <a href="{{$students->url($students->lastPage())}}" class="link external"><i class="icon f7-icons page-links">chevron_right_2</i></a>
        @endif
  </div>
</div>
@endsection('students')