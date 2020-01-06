@component('mail::message')
    {{ trans('admin.mail_suggest_deny') }}
    {{ trans('admin.sorry') }}
@component('mail::button', ['url' => route('admin.index')])
    {{ trans('admin.more_prd') }}
@endcomponent
@endcomponent
