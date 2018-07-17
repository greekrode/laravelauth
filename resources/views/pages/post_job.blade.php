@extends('layouts.default')
@section('content')
<!-- Main -->
<div class="main" role="main">

<!-- Page Heading -->
<section class="page-heading">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Post a Job</h1>
            </div>
            <div class="col-md-6">
                <ul class="breadcrumb">
                    <li><a href="index.html">Home</a></li>
                    <li><a href="#">Pet Sitters</a></li>
                    <li class="active">Post a Job</li>
                </ul>
            </div>
        </div>
    </div>
</section>
<!-- Page Heading / End -->

<!-- Page Content -->
<section class="page-content">
    <div class="container">
        
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <!-- Job Form -->
                <form action="{{ route('job.store') }}" method="post" id="submit-job-form" class="job-manager-form" enctype="multipart/form-data">
                @csrf

                    <!-- Job Information Fields -->
                    <fieldset class="fieldset-title">
                        {!! Form::label('title', 'Job Title' , array('class' => 'col-12 control-label')); !!}
                        <div class="field">
                            {!! Form::text('title', old('title'), array('id' => 'title', 'class' => 'form-control', 'placeholder' => 'Enter the job title')) !!}
                            @if ($errors->has('title'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('title') }}</strong>
                                </span>
                            @endif
                        </div>
                    </fieldset>

                    <fieldset class="fieldset-title">
                        {!! Form::label('location', 'Job Location', array('class' => 'col-12 control-label')); !!}
                        <div class="field">
                            {!! Form::text('location', old('location'), array('id' => 'location', 'class' => 'form-control', 'placeholder' => 'Enter the job location')) !!}
                            @if ($errors->has('location'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('location') }}</strong>
                                </span>
                            @endif
                            <small class="description">Leave this blank if the job can be done from anywhere (i.e. telecommuting)</small>
                        </div>
                    </fieldset>

                    <div class="row">
                        <div class="col-md-6">
                            <fieldset class="fieldset-job_category">
                                <label for="job_category">Product Category</label>
                                <div class="field select-style">
                                    <select class="form-control" name="category_type_id" id="category_type_id">
                                        @if (count($category))
                                            @foreach($category as $key => $c)
                                              <option value="{{ $key }}">{{ $c }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>
                            </fieldset>
                        </div>
                    </div>

                    <fieldset class="fieldset-job_description">
                        {!! Form::label('description', 'Product description' , array('class' => 'col-12 control-label')); !!}
                        <div class="field">
                            {!! Form::textarea('description', old('description'), array('id' => 'description', 'class' => 'form-control', 'placeholder' => 'Write the job description')) !!}
                            @if ($errors->has('description'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('description') }}</strong>
                                </span>
                            @endif
                        </div>
                    </fieldset>

                    <fieldset class="fieldset-application">
                        <label for="application">Price</label>
                        <div class="field">
                            <input type="text" class="form-control" name="application" id="application" placeholder="Enter an email address or website URL" />
                        </div>
                    </fieldset>

                    <fieldset class="fieldset-company_logo">
                        <label for="company_logo">Photo <small>(optional)</small></label>
                        <div class="field">
                            <input type="file" class="form-control" name="company_logo" id="company_logo" />
                            <small class="description">
                            Max. file size: 32 MB.</small>
                        </div>
                    </fieldset>

                    <div class="spacer"></div>

                    <p>
                        <input type="submit" name="submit_job" class="btn btn-primary" value="Preview Job Listing &rarr;" />
                    </p>

                </form>
                <!-- Job Form / End -->
            </div>
        </div>

    </div>
</section>
<!-- Page Content / End -->
@stop