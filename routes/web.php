<?php
use App\Http\Controllers\GestorController;
use App\Http\Controllers\MentoradoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjetoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PainelController;
use App\Http\Controllers\EditalController;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/create',  [MentoradoController::class, 'create'])->name('create');
Route::post('/store',  [MentoradoController::class, 'store'])->name('store');


Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/painel/home', [PainelController::class, 'dashboard'])->name('painel.home');
    Route::get('/logout', [PainelController::class, 'logout'])->name('logout');


    Route::resource('projeto', ProjetoController::class, ['except' => [
        'create', 'show'
    ]]);
    Route::get('/projeto/filtro', [ProjetoController::class, 'filtro'])->name('projeto.filtro');
    Route::get('/projeto/export', [ProjetoController::class, 'export'])->name('projeto.export');
    Route::get('/projeto/painel', [ProjetoController::class, 'painel'])->name('projeto.painel');
    Route::get('/projeto/create/{id}', [ProjetoController::class, 'create'])->name('projeto.create');
    Route::get('/projeto/showEquipe/{id}', [ProjetoController::class, 'showEquipe'])->name('projeto.showEquipe');
    Route::get('/projeto/show/{id}', [ProjetoController::class, 'show'])->name('projeto.show');
    Route::get('/projeto/updateAprovacao/{id}', [ProjetoController::class, 'updateAprovacao'])->name('projeto.updateAprovacao');
    Route::get('/projeto/editRejeicao/{id}', [ProjetoController::class, 'editRejeicao'])->name('projeto.editRejeicao');
    Route::post('/projeto/updateRejeicao/{id}', [ProjetoController::class, 'updateRejeicao'])->name('projeto.updateRejeicao');
    Route::get('/projeto/filtroSituacao', [ProjetoController::class, 'filtroSituacao'])->name('projeto.filtroSituacao');
    Route::get('/projeto/showParticipante/{id}/{id_projeto}', [ProjetoController::class, 'showParticipante'])->name('projeto.showParticipante');
    Route::post('/projeto/storeEquipe/{id}', [ProjetoController::class, 'storeEquipe'])->name('projeto.storeEquipe');
    Route::get('/projeto/createEquipe/{id}', [ProjetoController::class, 'createEquipe'])->name('projeto.createEquipe');
    Route::get('/projeto/showParticipante/{id}', [ProjetoController::class, 'showParticipante'])->name('projeto.showParticipante');
    Route::get('/projeto/editParticipante/{id}/{id_projeto}', [ProjetoController::class, 'editParticipante'])->name('projeto.editParticipante');
    Route::put('/projeto/updateParticipante/{id}/{id_projeto}', [ProjetoController::class, 'updateParticipante'])->name('projeto.updateParticipante');
    Route::get('/projeto/destroyParticipante/{id}', [ProjetoController::class, 'destroyParticipante'])->name('projeto.destroyParticipante');
    Route::put('/projeto/edit/{id}', [ProjetoController::class, 'edit'])->name('projeto.edit');
    Route::post('/projeto/update/{id}', [ProjetoController::class, 'update'])->name('projeto.update');
    Route::get('/projeto/editJustificativa/{id}', [ProjetoController::class, 'editJustificativa'])->name('projeto.editJustificativa');
    Route::get('/mentorado/{id}/anexo/download/', [MentoradoController::class, 'download'])->name('mentorado.anexo.download');

    Route::resource('edital', EditalController::class, ['except' => [
        'destroy', 'show', 'edit', 'update'
    ]]);
    Route::get('/edital/filtro', [EditalController::class, 'filtro'])->name('edital.filtro');
    Route::get('/edital/editSituacao/{id}', [EditalController::class, 'editSituacao'])->name('edital.editSituacao');
    Route::post('/edital/updateSituacao/{id}', [EditalController::class, 'updateSituacao'])->name('edital.updateSituacao');
    Route::get('/editais/update/{id}', [EditalController::class, 'update'])->name('edital.update');
    Route::get('/editais/edit/{id}', [EditalController::class, 'edit'])->name('edital.edit');




    Route::resource('gestor', GestorController::class, ['except' => [
        'destroy', 'show', 'create', 'store'
    ]]);
    Route::get('/gestor/filtro', [GestorController::class, 'filtro'])->name('gestor.filtro');
    Route::get('/gestores/destroy/{email}',  [GestorController::class, 'destroy'])->name('gestor.destroy');
    Route::get('/gestores/create',  [GestorController::class, 'create'])->name('gestor.create');
    Route::post('/gestores/store',  [GestorController::class, 'store'])->name('gestor.store');
    Route::get('/gestores/edit/{id}', [GestorController::class, 'edit'])->name('gestor.edit');
    Route::post('/gestores/update/{id}',  [GestorController::class, 'update'])->name('gestor.update');

    Route::get('/profile/editSenha/',  [ProfileController::class, 'editSenha'])->name('profile.editSenha');
    Route::get('/profile/editPerfil/',  [ProfileController::class, 'editPerfil'])->name('profile.editPerfil');
    Route::post('/profile/updatePerfil/',  [ProfileController::class, 'updatePerfil'])->name('profile.updatePerfil');



});




