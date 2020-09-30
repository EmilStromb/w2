<?php
require_once("view/addMember.php");


class view {
  private static $addMember = 'view::NewMember';
  private $body;
  public function render() {
      echo '<!DOCTYPE html>
        <html>
          <head>
            <meta charset="utf-8">
            <title>Workshop 2</title>
          </head>
          <body>
          <nav>
            <button name="">Verbose List</button>
            <button name="">Compact List</button>
            <form method="post" > 
            <fieldset>
                <input type="submit" name="' . self::$addMember . '" value="New member" />
            </fieldset>
        </form>
          </nav>
            <h1>Welcome to our boatclub</h1>
            <div>
              ' . $this->body . '
            </div>
           </body>
        </html>
      ';
    }
}
