<?php
/**
 * @copyright Sharapov A. <alexander@sharapov.biz>
 * @link      http://www.sharapov.biz/
 * @license   https://www.gnu.org/licenses/gpl-3.0.en.html GNU General Public License
 * Date: 2019-02-15
 * Time: 15:40
 */
include '../vendor/autoload.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="assets/css/app.min.css">
  <script type="text/javascript" src="assets/js/app.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dockerized Skeleton PHP Application</title>
</head>
<body>
<div class="l--constrained">
  <fieldset class="m--bottom-lg">
    <legend>Buttons</legend>
    <button class="l--btn">Button</button>
    <button class="l--btn" disabled>Disabled button</button>
    <input class="l--btn" type="submit" value="Submit" />
    <input class="l--btn" type="button" value="Button" />
    <input class="l--btn" type="reset" value="Reset" />
  </fieldset>
  <fieldset class="m--bottom-lg">
    <legend>Links</legend>
    <a href="#">Demo link</a>
    <a href="#" class="l--btn">Button</a>
  </fieldset>
  <fieldset class="m--bottom-lg">
    <legend>Tables</legend>
    <table class="l--table">
      <thead>
        <tr>
          <th scope="col">Firstname</th>
          <th scope="col">Lastname</th>
          <th scope="col">Email</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td data-label="Firstname">John</td>
          <td data-label="Lastname">Doe</td>
          <td data-label="Email">john@example.com</td>
        </tr>
        <tr>
          <td data-label="Firstname">Mary</td>
          <td data-label="Lastname">Moe</td>
          <td data-label="Email">mary@example.com</td>
        </tr>
        <tr>
          <td data-label="Firstname">July</td>
          <td data-label="Lastname">Dooley</td>
          <td data-label="Email">july@example.com</td>
        </tr>
      </tbody>
    </table>
  </fieldset>
  <fieldset class="m--bottom-lg">
    <legend>Headings</legend>
    <h1>Heading 1</h1>
    <h2>Heading 2</h2>
    <h3>Heading 3</h3>
    <h4>Heading 4</h4>
    <h5>Heading 5</h5>
    <h6>Heading 6</h6>
  </fieldset>
  <fieldset class="m--bottom-lg">
    <legend>Cards</legend>
    <ul class="l--card">
      <li>test</li>
      <li>test</li>
      <li>test</li>
      <li>test</li>
      <li>test</li>
    </ul>
  </fieldset>
  <fieldset class="m--bottom-lg">
    <legend>Inputs</legend>
    <form class="l--form">
      <label>Standard input
        <input type="text" value="" placeholder="Standard input placeholder">
      </label>
      <label>Standard input disabled
        <input type="text" value="" placeholder="Standard input placeholder" disabled>
      </label>
      <label>Standard dropdown
        <select>
          <option selected></option>
          <option>Option 1</option>
          <option>Option 2</option>
          <option>Option 3</option>
          <option>Option 4</option>
        </select>
      </label>
      <label>Radio option 1
        <input type="radio" name="standardRadio" value="on" />
      </label>
      <label>Radio option 2
        <input type="radio" name="standardRadio" value="off" />
      </label>
      <label>Checkbox 1
        <input type="checkbox" name="checkbox_1" value="on" />
      </label>
      <label>Checkbox 2
        <input type="checkbox" name="checkbox_2" value="on" />
      </label>
      <label>Textarea input
        <textarea rows="4" placeholder="Standard textarea placeholder"></textarea>
      </label>
    </form>
  </fieldset>
  <fieldset class="m--bottom-lg" style="height: 3em;">
    <legend>Spinner</legend>
    <svg class="l--spinner" viewBox="0 0 50 50">
      <circle cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
    </svg>
  </fieldset>
  <fieldset class="m--bottom-lg">
    <legend>Predefined fontello icons</legend>
    <i class="icon--home"></i>
    <i class="icon--cog"></i>
    <i class="icon--user"></i>
    <i class="icon--menu"></i>
    <i class="icon--download-cloud"></i>
    <i class="icon--doc-text"></i>
    <i class="icon--apple"></i>
    <i class="icon--git"></i>
  </fieldset>
</div>
<div class="l--constrained">
  <fieldset class="m--bottom-lg">
    <legend>Database connection</legend>
    <?php
    $dotenv = Dotenv\Dotenv::create('../');
    $dotenv->load();

    try {
      $dbh = new PDO("mysql:host=" . getenv('MYSQL_HOST') . ";dbname=" . getenv('MYSQL_DATABASE'),
                     getenv('MYSQL_USER'),
                     getenv('MYSQL_PASSWORD')
      );
      print '<p class="t--green">Successfully connected</p>';
    } catch (PDOException $e) {
      print $e->getMessage();
    }
    ?>
    </fieldset>
</div>
<div class="l--constrained">
  <fieldset class="m--bottom-lg">
    <legend>Modal</legend>
    <button class="l--btn" data-toggle="modal" data-target="#exampleModal">Open modal</button>
  </fieldset>
</div>

<div id="exampleInnerModal" class="l--modal">
  <div class="l--modal-inner">
    <div class="l--modal-header">
      Inner demo modal window <button class="l--modal-close"></button>
    </div>
    <div class="l--modal-content">
    <p>Lorem Ipsum is simply. <button
          class="l--btn" data-toggle="modal" data-target="#exampleInner2Modal">Open modal 2</button></p>
    </div>
    <div class="l--modal-footer">
      <button class="l--btn">Save</button><button class="l--btn l--modal-close">Close</button>
    </div>
  </div>
</div>

<div id="exampleModal" class="l--modal">
  <div class="l--modal-inner">
    <div class="l--modal-header">
      Demo modal window <button class="l--modal-close"></button>
    </div>
    <div class="l--modal-content">
    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
      standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum. <button
          class="l--btn" data-toggle="modal" data-target="#exampleInnerModal">Open modal</button></p>
    <table class="l--table">
      <thead>
        <tr>
          <th scope="col">Firstname</th>
          <th scope="col">Lastname</th>
          <th scope="col">Email</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td data-label="Firstname">John</td>
          <td data-label="Lastname">Doe</td>
          <td data-label="Email">john@example.com</td>
        </tr>
        <tr>
          <td data-label="Firstname">Mary</td>
          <td data-label="Lastname">Moe</td>
          <td data-label="Email">mary@example.com</td>
        </tr>
        <tr>
          <td data-label="Firstname">July</td>
          <td data-label="Lastname">Dooley</td>
          <td data-label="Email">july@example.com</td>
        </tr>
      </tbody>
    </table>
    </div>
    <div class="l--modal-footer">
      <button class="l--btn">Save</button><button class="l--btn l--modal-close">Close</button>
    </div>
  </div>
</div>
<div id="exampleInner2Modal" class="l--modal">
  <div class="l--modal-inner">
    <div class="l--modal-header">
      Inner demo modal 2 window <button class="l--modal-close"></button>
    </div>
    <div class="l--modal-content">
    <p>Lorem Ipsum is simply.</p>
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
      standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to
        make a type specimen book. It has survived not only five centuries, but also the leap into electronic
        typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
      standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to
        make a type specimen book. It has survived not only five centuries, but also the leap into electronic
        typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
      standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to
        make a type specimen book. It has survived not only five centuries, but also the leap into electronic
        typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
      standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to
        make a type specimen book. It has survived not only five centuries, but also the leap into electronic
        typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
      standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to
        make a type specimen book. It has survived not only five centuries, but also the leap into electronic
        typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
    </div>
    <div class="l--modal-footer">
      <button class="l--btn">Save</button><button class="l--btn l--modal-close">Close</button>
    </div>
  </div>
</div>
</body>
</html>
