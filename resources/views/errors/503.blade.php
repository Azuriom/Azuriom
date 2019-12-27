@extends('errors::layout-basic')

@section('title', trans('errors.503.title'))
@section('code', '503')
@section('message', $exception->getMessage() ?? trans('errors.503.desc')))
