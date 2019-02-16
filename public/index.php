<?php
/**
 * @copyright Sharapov A. <alexander@sharapov.biz>
 * @link      http://www.sharapov.biz/
 * @license   https://www.gnu.org/licenses/gpl-3.0.en.html GNU General Public License
 * Date: 2019-02-15
 * Time: 15:40
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" type="text/css" href="assets/css/app.min.css">
  <title>Dockerized Skeleton PHP Application</title>
</head>
<body>
<div class="l--constrained">
  <fieldset style="margin-bottom: 2em">
    <legend>Buttons</legend>
    <button class="l--btn">Button</button>
    <button class="l--btn" disabled>Disabled button</button>
    <input class="l--btn" type="submit" value="Submit" />
    <input class="l--btn" type="button" value="Button" />
    <input class="l--btn" type="reset" value="Reset" />
  </fieldset>
  <fieldset style="margin-bottom: 2em">
    <legend>Links</legend>
    <a href="#">Demo link</a>
    <a href="#" class="l--btn">Button</a>
  </fieldset>
  <fieldset style="margin-bottom: 2em">
    <legend>Tables</legend>
    <table class="l--table">
      <thead>
        <tr>
          <th>Firstname</th>
          <th>Lastname</th>
          <th>Email</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>John</td>
          <td>Doe</td>
          <td>john@example.com</td>
        </tr>
        <tr>
          <td>Mary</td>
          <td>Moe</td>
          <td>mary@example.com</td>
        </tr>
        <tr>
          <td>July</td>
          <td>Dooley</td>
          <td>july@example.com</td>
        </tr>
      </tbody>
    </table>
  </fieldset>
  <fieldset style="margin-bottom: 2em">
    <legend>Headings</legend>
    <h1>Heading 1</h1>
    <h2>Heading 2</h2>
    <h3>Heading 3</h3>
    <h4>Heading 4</h4>
    <h5>Heading 5</h5>
    <h6>Heading 6</h6>
  </fieldset>
  <fieldset style="margin-bottom: 2em">
    <legend>Cards</legend>
    <ul class="l--card">
      <li>test</li>
      <li>test</li>
      <li>test</li>
      <li>test</li>
      <li>test</li>
    </ul>
  </fieldset>
  <fieldset style="margin-bottom: 2em">
    <legend>Inputs</legend>
    <form class="l--form">
      <label>Standard input
        <input type="text" value="" placeholder="Standard input placeholder">
      </label>
      <label>Standard dropdown
        <select>
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
    </form>
  </fieldset>
  <fieldset style="margin-bottom: 3em;">
    <legend>Spinner</legend>
    <svg class="l--spinner" viewBox="0 0 50 50">
      <circle cx="25" cy="25" r="20" fill="none" stroke-width="5"></circle>
    </svg>
  </fieldset>
</div>
</body>
</html>
