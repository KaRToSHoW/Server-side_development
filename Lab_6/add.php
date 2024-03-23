<div class="container">
    <form action="index.php" method="POST">
        <div class="form-group">
            <label for="firstname">firstname</label>
            <input type="text" class="form-control" id="firstname" placeholder="firstname" name="firstname">
        </div>
        <div class="form-group">
            <label for="firstname">name</label>
            <input type="text" class="form-control" id="name" placeholder="name" name="name">
        </div>
        <div class="form-group">
            <label for="lastname">lastname</label>
            <input type="text" class="form-control" id="lastname" placeholder="lastname" name="lastname">
        </div>
        <div class="form-group">
            <label for="gender">gender</label>
            <select class="form-control" id="gender" name="gender">
                <option>female</option>
                <option>male</option>
            </select>
        </div>
        <div class="form-group">
            <label for="date">date</label>
            <input type="date" class="form-control" id="date" placeholder="date" name="date">
        </div>
        <div class="form-group">
            <label for="phone">phone</label>
            <input type="tel" class="form-control" id="phone" placeholder="phone" name="phone">
        </div>
        <div class="form-group">
            <label for="email">email</label>
            <input type="email" class="form-control" id="email" placeholder="email" name="email">
        </div>
        <div class="form-group">
            <label for="adress">adress</label>
            <textarea class="form-control" id="adress" rows="3" name="adress"></textarea>
        </div>
        <div class="form-group">
            <label for="comment">comment</label>
            <textarea class="form-control" id="comment" rows="3" name="comment"></textarea>
        </div>
        <button type="submit" class="btn btn-primary mb-3">Save</button>
    </form>
</div>