<?

namespace app\components;

use yii\base\Widget;

class Table extends Widget{

public $head;
public $body;
public $result;
public $tableClass;


public function init(){
  $this->result = $this->result . "<table class=\"$this->tableClass\"><thead><tr>";

  foreach ($this->head as $item)
    $this->result = $this->result . "<th scope=\"col\">$item</th>";

  $this->result = $this->result . "</tr></thead><tbody>";

  foreach($this->body as $items) {
      $this->result = $this->result . "<tr>";
            foreach($items as $item){
              $this->result = $this->result . "<td>";
              $this->result = $this->result . $item;
              $this->result = $this->result . "</td>";
            }
      $this->result = $this->result . "</tr>";
  }

$this->result = $this->result . "</tbody></table>";
}

public function run(){
  return $this->result;
}


}
