<?php

namespace LaravelEnso\Localisation\app\Http\Controllers;

use Illuminate\Http\Request;
use LaravelEnso\Localisation\app\Classes\JsonLangManager;
use LaravelEnso\Localisation\app\Models\Language;

class LangFileController
{
    public function getLangFile(Language $language, JsonLangManager $service)
    {
        return response()->json($service->getContent($language->name));
    }

    public function editTexts()
    {
        $locales = Language::extra()->pluck('display_name', 'id');

        return compact('locales');
    }

    public function saveLangFile(Request $request, JsonLangManager $service)
    {
        return $service->update($request->get('locale'), $request->get('langFile'));
    }
}
