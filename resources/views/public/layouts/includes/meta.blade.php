<div class="container">
    <form method="post" action="{{ meta('id') ? route('admin.metas.update', meta('id')) : route('admin.metas.store') }}">
        @csrf
        @method('patch')

        <table class="table table-bordered">
            <tr>
                <td>uri</td>
                <td><input type="text" name="uri" value="{{ meta()->uri  }}" disabled></td>
            </tr>
            <tr>
                <td>lang</td>
                <td><input type="text" name="lang" value="{{ meta()->lang  }}" disabled></td>
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
