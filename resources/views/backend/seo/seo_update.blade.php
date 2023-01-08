@extends('admin.admin_dashboard')
@section('admin')

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<div class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
        <div class="breadcrumb-title pe-3">Seo Setting </div>
        <div class="ps-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb mb-0 p-0">
                    <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-user-circle"></i></a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">seo Setting</li>
                </ol>
            </nav>
        </div>
        <div class="ms-auto">

        </div>
    </div>
    <!--end breadcrumb-->
    <div class="container">
        <div class="main-body">
            <div class="row">
               
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">

                  <form method="post" action="{{ route('seo.setting.store')  }}">
                    @csrf

                    <input type="hidden" name="id" value="{{$SeoSetting->id}}">

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Meta Title</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text"   class="form-control" name="meta_title" value="{{ $SeoSetting->meta_title }}"  />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Meta Author</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="meta_author"  class="form-control" value="{{ $SeoSetting->meta_author }}"  />
                                </div>
                            </div>

                            
                        
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Meta Keyword</h6> 
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" name="meta_keyword" class="form-control" value="{{ $SeoSetting->meta_keyword }}" />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Meta Descripion</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text"  name="meta_descripion" class="form-control" value="{{ $SeoSetting->meta_descripion }}"  />
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-sm-3"></div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="submit" class="btn btn-primary px-4" value="Update" />
                                </div>
                            </div>
                        </div>

                    </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection
