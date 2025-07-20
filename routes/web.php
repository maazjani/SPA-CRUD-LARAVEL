<?php

use Illuminate\Support\Facades\Route;

use App\Livewire\Post\Index as PostIndex;

Route::get('/', PostIndex::class);
