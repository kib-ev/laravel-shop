<div class="container">

    <form method="post" action="{{ meta('id') ? route('admin.metas.update', meta('id')) : route('admin.metas.store') }}">
        @csrf

        @if(meta('id'))
            @method('patch')
        @else
            @method('post')
        @endif

        <p>Meta {{ meta('id') }}</p>
        <table class="table table-bordered">
            <tr>
                <td>uri</td>
                <td>
                    <input type="hidden" name="uri" value="{{ meta()->uri  }}">
                    <input type="text" value="{{ meta()->uri  }}" disabled>
                </td>

            </tr>
            <tr>
                <td>lang</td>
                <td>
                    <input type="hidden" name="lang" value="{{ meta()->lang  }}">
                    <input type="text" value="{{ meta()->lang  }}" disabled>
                </td>
            </tr>
            <tr>
                <td>title</td>
                <td><input type="text" name="title" value="{{ meta()->title  }}"></td>
            </tr>
            <tr>
                <td>description</td>
                <td><input type="text" name="description" value="{{ meta()->description  }}"></td>
            </tr>

            <tr>
                <td colspan="2">
                    <input type="submit" value="save">
                </td>
            </tr>
        </table>

    </form>
</div>
