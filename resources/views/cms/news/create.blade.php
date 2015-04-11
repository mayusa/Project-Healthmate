@extends('cms.default')

@section('content')

<div ng-controller="CmsNewsCreateCtrl">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
              <div class="row">
                <div class="col-sm-8 col-xs-12">
                  <h5><strong>CMS Create News </strong></h5>
                </div>
              </div>           
            </div>
            
            <div class="panel-body">
            <!-- success msg -->
            @if (Session::has('msg'))
               <div class="alert alert-success text-center">{{ Session::get('msg') }}</div>
            @endif
            <!-- error message -->
            @if (count($errors) > 0)
            <div class="alert alert-danger">
              <strong>Whoops!</strong> There were some problems with your input.<br><br>
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
            @endif
            
          <!-- start form -->
          <form id="news_form" action="/cms/news" method="POST" name="frm" novalidate>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="userid" value="{{Auth::id()}}">
              <div class="row">
              <div class="col-lg-8 col-lg-offset-2">
                
                <div id="err" class="text-danger"><% err_msg %></div> 
              </div>
              </div>
            <!-- news title -->
            <h5>
              <div class="row">
              <div class="col-lg-8 col-lg-offset-2">
                <div class="input-group">
                  <input type="text" class="form-control" aria-label="..." name="title" id="title" placeholder="News Title" ng-model="news.title" ng-change="checkInput()" required="required">
                  <div class="input-group-btn">
                  <input type="hidden" name="cateid" value="<% news.cateid %>">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"><% selected_cate %> <span class="caret"></span></button>
                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                      <li ng-repeat="category in newcatesall"><a href="#" ng-click='changeCate(category.category_name, category.id)'><% category.category_name %></a></li>
                    </ul>
                  </div><!-- /btn-group -->
                </div><!-- /input-group -->
              </div><!-- /.col-lg-6 -->

            </div>
            </h5>

            <!-- 加载ueditor 编辑器的容器 -->
            <h5>
            <div class="row">
              <div class="col-lg-8 col-lg-offset-2">
                <script id="createContainer" name="content" type="text/plain" ng-model="news.content" ng-change="checkInput()"></script>
              </div><!-- /.col-lg-6 -->
            </div>
            </h5>

            <h5>
            <div class="row">
              <div class="col-lg-8 col-lg-offset-2">
                  <input type="text" class="form-control" aria-label="..." name="fromurl" id="fromurl" placeholder="News Source (URL)" ng-model="news.fromurl">
              </div><!-- /.col-lg-6 -->
            </div>
            </h5>

          <div class="text-center">
            <button class="btn btn-lg btn-info col-xs-12 col-xs-offset-0 col-md-4 col-md-offset-4" ng-click="submitNews( $event )">Submit</button>
          </div>

          </form>
          <!-- / end form -->

            </div>
        </div>
    </div>

</div>

<script>

// 实例 ueditor 编辑器
var uecreate = UE.getEditor('createContainer');
uecreate.ready(function(){});

  </script>
@endsection