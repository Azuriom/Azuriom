@extends('errors::layout')

@section('title', trans('errors.403.title'))
@section('code', '403')
@section('message', $exception->getMessage() ?: trans('errors.403.message'))
