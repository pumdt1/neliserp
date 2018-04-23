@extends('layouts.app')

@section('content')

<oi-list :list-template={!! json_encode($listTemplate) !!} inline-template>

<div>
    <!-- <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-tasks-center pb-2 mb-3 border-bottom">
        <h5>{{ $listTemplate->listTitle }}</h5>
        <form method="GET" action="/{{$listTemplate->listType}}" id="{{$listTemplate->listType}}-search" class="form-inline">
            <label class="mr-2" for="q">{{$listTemplate->searchTitle}}</label>
            <input type="text" class="form-control" id="q" name="q" value="{{ request('q') }}">
            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
        </form>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group">
                <a href="/{{$listTemplate->listType}}/create" class="btn btn-sm btn-outline-success">{{ __('create') }}</a>
            </div>
        </div>
    </div> -->

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-tasks-center pb-2 mb-3 border-bottom">
        <h5>@{{ listTemplate.listTitle }}</h5>
        <form method="GET" :action="'/'+listTemplate.listType " :id="listTemplate.listType+ '-search'" class="form-inline">
            <label class="mr-2" for="q">@{{listTemplate.searchTitle}}</label>
            <input type="text" class="form-control" id="q" name="q" value="{{ request('q') }}">
            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
        </form>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group">
                <a href="'/'+listTemplate.listType+'/create'" class="btn btn-sm btn-outline-success">{{ __('create') }}</a>
            </div>
        </div>
    </div>


    <table class="table table-bordered table-hover">
        <thead class="thead-light">
            <tr>
                <!-- <th>{{ __('welcome') }}</th> -->
                    <th v-for="header in listTemplate.listHeaders"> @{{ header }}
                    </th>
            </tr>
        </thead>
        <tbody>
            <tr v-if="! done">
                <td colspan="2">
                    <i class="fa fa-spinner fa-spin"></i> {{ __('loading') }}
                </td>
            </tr>
            <tr v-if="done && listTemplate.listColumns.length == 0">
                <td colspan="2">
                    not found
                </td>
            </tr>
            <tr v-for="item in lists" :key="item.uuid">
                <td v-for="column in listTemplate.listColumns"> @{{ item[column] }} </td>

            </tr>
        </tbody>
    </table>

    @include('pagination', ['appends' => ['q' => request('q', '')]])

</div>

</oi-list>
@endsection
