@extends('cms.default')

@section('content')

<div ng-controller="CmsNewsCtrl">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
              <div class="row">
                <div class="col-sm-8 col-xs-12">
                  <h5><strong>CMS News List</strong> <a href="/cms/news/create" class="btn btn-default" >add news</a></h5>
                </div>

              </div>           
            </div>
            <div class="panel-body">
              <span ng-repeat="category in newcatesall"> 
                news category<% $index+1 %>: <% category.category_name %>  <br>
              </span>

            </div>
        </div>
    </div>

</div>
@endsection