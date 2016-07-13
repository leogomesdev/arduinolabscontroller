@if (count($errors)>0)
    <div class="alert alert-danger alert-dismissible caixa-de-erro">
          <h4><i class="icon fa fa-exclamation-triangle"></i> Erro!</h4>
          <ul>
              @foreach($errors->all() as $mensagem)
                    <li>{!! $mensagem !!}</li>
              @endforeach
          </ul>
    </div>
@endif
@if (session('sucesso'))
    <div class="alert alert-success alert-dismissible">
          <h4><i class="icon fa fa-check"></i> Sucesso!</h4>
          <ul>
              <li>{!! session('sucesso') !!}</li>
          </ul>
    </div>
@endif