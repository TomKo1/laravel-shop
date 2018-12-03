<form action="{{ route($routeName) }}" method="post">
        <div class="form-group">
          <label for="email">E-mail</label>
          <input type="text" id="email" name="email" class="form-control">
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" class="form-control">
        </div>
          <button type="submit" class="btn btn-primary">{{ $actionName }}</button>
          {{ csrf_field() }}
      </form>