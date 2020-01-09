@component('mail::message')
    {{ trans('admin.mail_suggest_deny') }}
    {{ trans('admin.sorry') }}
@component('mail::button', ['url' => route('home.suggest')])
    {{ trans('admin.more_prd') }}
@endcomponent
@endcomponent
