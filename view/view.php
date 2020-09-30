<?php
require_once("view/addMember.php");


class view {
  private static $addMember = 'view::NewMember';
  private static $verboseList = 'view::VerboseList';
  private static $compactList = 'view::CompactList';
  public function render($body) {
      echo '<!DOCTYPE html>
        <html>
          <head>
            <meta charset="utf-8">
            <title>Workshop 2</title>
          </head>
          <body>
          <nav>
            <form method="post" > 
            <fieldset>
                <input type="submit" name="' . self::$verboseList . '" value="Verbose list" />
                <input type="submit" name="' . self::$compactList . '" value="Compact list" />
                <input type="submit" name="' . self::$addMember . '" value="New member" />
            </fieldset>
        </form>
          </nav>
            <h1>Welcome to our boatclub</h1>
            <div>
              ' . $body->show() . '
            </div>
           </body>
        </html>
      ';
    }
}
