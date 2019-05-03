<div class="box box-info">
    <div class="box-header with-border">
        <h3 class="box-title">Notes</h3>
    </div>
    @foreach($notes as $note)
    <div class="box-footer box-comments">
        <div class="box-comment">
            <div class="comment-text" style="margin-left: 0">
                                  <span class="username">
                                    {{ $note->auteur }}
                                    <span class="text-muted pull-right">{{ $note->date->format('d/m/Y H:i') }}</span>
                                  </span><!-- /.username -->
                {{ $note->texte }}
            </div>
            <!-- /.comment-text -->
        </div>
        <!-- /.box-comment -->
    </div>
    @endforeach
    <!-- /.box-footer -->
    <div class="box-footer">
        <form action="{{ $create_url }}" method="post">
            @csrf
            <div class="input-group">
                <input type="text" name="message" placeholder="Votre note" class="form-control">
                <span class="input-group-btn">
                        <button type="submit" class="btn btn-success btn-flat"><i class="fa fa-plus-square"></i></button>
                      </span>
            </div>
        </form>
    </div>
    <!-- /.box-footer -->
</div>