@extends('UserPages.master')
@section('title')
    Perencanaan
@endsection
@section('content')
    <div class="container" style="margin-top:8rem;">
        <div class="card p-3 mt-4">
            <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                  <button class="nav-link active text-info" id="rpjm-tab" data-bs-toggle="tab" data-bs-target="#rpjm" type="button" role="tab" aria-controls="rpjm" aria-selected="true">RPJM</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link text-info" id="rkp-tab" data-bs-toggle="tab" data-bs-target="#rkp" type="button" role="tab" aria-controls="rkp" aria-selected="false">RKP</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link text-info" id="perdes-tab" data-bs-toggle="tab" data-bs-target="#perdes" type="button" role="tab" aria-controls="perdes" aria-selected="false">Perdes</button>
                </li>
                <li class="nav-item" role="presentation">
                  <button class="nav-link text-info" id="perkades-tab" data-bs-toggle="tab" data-bs-target="#perkades" type="button" role="tab" aria-controls="perkades" aria-selected="false">Perkades</button>
                </li>
              </ul>
              <div class="tab-content mt-4" id="myTabContent">
                {{-- RPJM --}}
                <div class="tab-pane fade show active" id="rpjm" role="tabpanel" aria-labelledby="rpjm-tab">
                   <ol type="1">
                    @foreach ($rpjm as $item)
                    <li>
                      <a class="text-info" href="{{ asset('/storage'.'/'.$item->file) }}" target='_blank' rel='noopener noreferrer'><u>{{ $item->nama }}</u></a>
                    </li>
                  @endforeach
                   </ol>
                </div>
    
                {{-- RKP --}}
                <div class="tab-pane fade" id="rkp" role="tabpanel" aria-labelledby="rkp-tab">
                  <ol type="1">
                    @foreach ($rkp as $item)
                    <li>
                      <a class="text-info" href="{{ asset('/storage'.'/'.$item->file) }}" target='_blank' rel='noopener noreferrer'><u>{{ $item->nama }}</u></a>
                    </li>
                  @endforeach
                  </ol>
                </div>
    
                {{-- Perdes --}}
                <div class="tab-pane fade" id="perdes" role="tabpanel" aria-labelledby="perdes-tab">
                  <ol type="1">
                    @foreach ($perdes as $item)
                    <li>
                      <a class="text-info" href="{{ asset('/storage'.'/'.$item->file) }}" target='_blank' rel='noopener noreferrer'><u>{{ $item->nama }}</u></a>
                    </li>
                  @endforeach
                  </ol>
                </div>
    
                {{-- Perdakes --}}
                <div class="tab-pane fade" id="perkades" role="tabpanel" aria-labelledby="perkades-tab">
                 <ol type="1">
                  @foreach ($perkades as $item)
                  <li>
                    <a class="text-info" href="{{ asset('/storage'.'/'.$item->file) }}" target='_blank' rel='noopener noreferrer'><u>{{ $item->nama }}</u></a>
                  </li>
                  @endforeach
                 </ol>
                </div>
              </div>
        </div>
        </div>
@endsection