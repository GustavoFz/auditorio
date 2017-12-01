<?php

// SITE
Route::get('/', ['as'=>'site.home','uses'=>'SiteController@home']);
Route::get('/home', 'HomeController@index')->name('home');


// AUDITORIOS
Route::get('/auditorios',['as'=>'site.auditorios','uses'=>'AuditorioController@index']);
Route::get('/auditorio/adicionar',['as'=>'admin.auditorio.adicionar','uses'=>'AuditorioController@adicionar']);
Route::post('/auditorio/salvar', ['as'=>'admin.auditorio.salvar','uses'=>'AuditorioController@salvar']);
Route::get('/auditorio/editar/{id}',['as'=>'admin.auditorio.editar','uses'=>'AuditorioController@editar']);
Route::put('/auditorio/atualizar/{id}',['as'=>'admin.auditorio.atualizar','uses'=>'AuditorioController@atualizar']);
Route::get('/auditorio/deletar/{id}',['as'=>'admin.auditorio.deletar','uses'=>'AuditorioController@deletar']);

// Agendamento
Route::get('/agendamentos/',['as'=>'agendamento.listar','uses'=>'AgendamentoController@agendamentos']);
Route::get('/agendamento/agendar/{id}',['as'=>'agendamento.agendar','uses'=>'AgendamentoController@agendar']);
Route::post('/agendamento/salvar/',['as'=>'agendamento.salvar','uses'=>'AgendamentoController@salvar']);


//Autencicação
Auth::routes();


