<?php

namespace Azuriom\Http\Controllers\Admin;

use Azuriom\Http\Controllers\Controller;
use Azuriom\Models\Setting;
use Azuriom\Support\LangHelper;
use DateTimeZone;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SettingsController extends Controller
{
    public function index()
    {
        return view('admin.settings.index')
            ->with('languages', LangHelper::getAvailableLanguages())
            ->with('timezones', array_values(DateTimeZone::listIdentifiers(DateTimeZone::ALL)))
            ->with('currentTimezone', config('app.timezone'));
    }

    public function update(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:50'],
            'description' => ['required', 'string', 'max:255'],
            'url' => ['required', 'url'],
            'timezone' => ['required', 'timezone'],
            'locale' => ['required', 'string', Rule::in(array_keys(LangHelper::getAvailableLanguages()))]
        ]);

        $settings = $request->only(['name', 'description', 'url', 'timezone', 'locale']);

        foreach ($settings as $name => $value) {
            Setting::updateOrCreate(['name' => $name], ['value' => $value]);
        }

        return redirect()->route('admin.settings.index')->with('success', 'Settings updated');
    }
}
