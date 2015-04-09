@extends('cms.default')

@section('content')

<div ng-controller="CmsNewsEditCtrl">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
              <div class="row">
                <div class="col-sm-8 col-xs-12">
                  <h5><strong>Edit News </strong></h5>
                </div>
              </div>           
            </div>

            <div class="panel-body">

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
          <form id="news_form" name="frm" novalidate>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" name="id" value="{{ $news->id }}" id="newsid">

              <div class="row">
              <div class="col-lg-6 col-lg-offset-3">
                
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
                      <li ng-repeat="category in newcatesall">
                        <a href="#" ng-click='changeCate(category.category_name, $index+1)'><% category.category_name %></a>
                      </li>
                    </ul>
                  </div><!-- /btn-group -->
                </div><!-- /input-group -->
              </div><!-- /.col-lg-6 -->

            </div>
            </h5>

            <h5>
            <div class="row">
              <div class="col-lg-8 col-lg-offset-2">

                <!-- 加载ueditor 编辑器的容器 -->
                <script id="editContainer" name="content" type="text/plain" ng-model="news.content" ng-change="checkInput()"></script>
              </div><!-- /.col-lg-6 -->

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
            <button class="btn btn-lg btn-info col-xs-12 col-xs-offset-0 col-md-4 col-md-offset-4" ng-click="updateNews( $event, news )">Submit</button>
          </div>
          </form>
          <!-- / end form -->

            </div>
        </div>
    </div>

<script>
// 实例 ueditor 编辑器, instance name should be variable
var ueedit = UE.getEditor('editContainer');
ueedit.ready(function(){
  var newsContent = '{{ $news->content }}';
  newsContent = UE.utils.html(newsContent);
  // console.log(newsContent);
  UE.getEditor('editContainer').setContent(newsContent);

  //ue.execCommand('insertHtml', "{{ $news->content }}");
})
</script>
</div>
@endsection