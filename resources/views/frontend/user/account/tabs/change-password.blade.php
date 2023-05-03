{{ html()->form('PATCH', route('frontend.auth.password.update'))->class('form-horizontal')->open() }}
    <div class="row">
        <div class="col">
            <div class="mb-5">
                {{ html()->label(__('validation.attributes.frontend.old_password'))->class('form-label')->for('old_password') }}

                {{ html()->password('old_password')
                    ->class('form-control')
                    ->placeholder(__('validation.attributes.frontend.old_password'))
                    ->autofocus()
                    ->required() }}
            </div><!--form-group-->

            <div class="mb-5">
                {{ html()->label(__('validation.attributes.frontend.password'))->class('form-label')->for('password') }}

                {{ html()->password('password')
                    ->class('form-control')
                    ->placeholder(__('validation.attributes.frontend.password'))
                    ->required() }}
            </div><!--form-group-->


            <div class="mb-10">
                {{ html()->label(__('validation.attributes.frontend.password_confirmation'))->class('form-label')->for('password_confirmation') }}

                {{ html()->password('password_confirmation')
                    ->class('form-control')
                    ->placeholder(__('validation.attributes.frontend.password_confirmation'))
                    ->required() }}
            </div><!--form-group-->


            <div class="form-group mb-0 clearfix">
                {{ form_submit(__('labels.general.buttons.update') . ' ' . __('validation.attributes.frontend.password')) }}
            </div><!--form-group-->


        </div><!--col-->
    </div><!--row-->


{{ html()->form()->close() }}
