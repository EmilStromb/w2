<?php
require_once("view/addMember.php");


class View {
  private $addMember = 'view::NewMember';
  private $verboseList = 'view::VerboseList';
  private $compactList = 'view::CompactList';
  public function render($body) {
      echo '<!DOCTYPE html>
        <html>
          <head>
            <meta charset="utf-8">
            <title>Workshop 2</title>
          </head>
          <body>
          <h1>Welcome to our boatclub</h1>
          <nav>
            <form method="post" > 
            <fieldset>
                <input type="submit" name="' . $this->verboseList . '" value="Verbose list" />
                <input type="submit" name="' . $this->compactList . '" value="Compact list" />
                <input type="submit" name="' . $this->addMember . '" value="New member" />
            </fieldset>
        </form>
          </nav>
            
            <div>
              ' . $body->show() . '
            </div>
           </body>
        </html>
      ';
    }
    public function getMemberBtn() {
      return isset($_POST[$this->addMember]);
    }
    public function getVerboseListBtn() {
      return isset($_POST[$this->verboseList]);
    }
    public function getCompactListBtn() {
      return isset($_POST[$this->compactList]);
    }
}
