<?php

use Phphleb\Docs\Src\Code;
use Phphleb\Docs\Src\Paragraph;

?>
<?= Paragraph::h1('Set of traits for creating API') ?>

<p>
    To implement <span class="notranslate">API</span> in the <span class="notranslate">HLEB2</span> framework, a set of traits is provided to simplify validation and data processing in controllers (where these traits are applied).
</p>
<p class="hl-info-block">
    The use of traits in <span class="notranslate">PHP</span> is a matter of various opinions, which is why this module is provided as a separate library, which you may choose to use;
    there is quite a number of validators available for development in <span class="notranslate">PHP</span>, and this is just a simple working alternative.
</p>
<p>
    Installation of the library <span class="notranslate"><a href="https://github.com/phphleb/api-multitool" target="_blank">github.com/phphleb/api-multitool</a></span> using <span class="notranslate">Composer</span>:
</p>

<p class="hl-bash-block"><span class="hl-not-selected notranslate">$</span>composer require phphleb/api-multitool</p>

<p>
    or download and unpack the library archive into the folder <span class="notranslate">/vendor/phphleb/api-multitool</span>.
</p>

<?= Paragraph::h2('Connecting the BaseApiTrait (set of traits)') ?>

<p>
    First, you need to create a parent class <span class="notranslate">BaseApiActions</span> (or another name) for controllers with <span class="notranslate">API</span>:
</p>

<?= Code::fromFile('@views/docs/code/extra/libraries/api/api.base.php');  ?>

<p>
    All auxiliary traits are collected in <span class="notranslate">BaseApiTrait</span> as a set.
    Therefore, it is enough to connect it to the controller and get the full implementation.
    If a different set of these traits is required, then either use them as a group or combine them into your own set.
</p>
<p>
    After this, in all controllers inherited from this class, methods from each trait in the set will appear:
</p>

<?= Paragraph::h2('ApiHandlerTrait') ?>

<p>
    The trait <span class="notranslate">ApiHandlerTrait</span> contains several methods that may be useful for processing returned <span class="notranslate">API</span> data.
    This does not mean that its methods <span class="notranslate">'present'</span> and <span class="notranslate">'error'</span> form the final response, they return named arrays, which can be used in your own more complex standard.
    An example in the controller method:
</p>

<?= Code::fromFile('@views/docs/code/extra/libraries/api/api.handler.php');  ?>

<p>
    In the <span class="notranslate">HLEB</span> framework, when returning an array from a controller, it is automatically converted into <span class="notranslate">JSON</span>.
    When displaying the formatted array, a value <span class="notranslate">'error_cells'</span> is added with a list of fields where validation errors occurred (if any).
</p>

<?= Paragraph::h2('ApiMethodWrapperTrait') ?>

<p>
    Intercepts system errors and provides output to the <span class="notranslate">'error'</span> method of the previous trait <span class="notranslate">ApiHandlersTrait</span> or another designated for this purpose (if the mentioned trait is not used).
    If a controller method is called, for proper error handling, you need to add the prefix <span class="notranslate">'action'</span> in the controller, and in the route, leave it without the prefix. For example, for the previous controller example, the routing would be approximately like this:
</p>

<?= Code::fromFile('@views/docs/code/extra/libraries/api/api.action.route.php', false);  ?>

<p>
    Here it should be noted that originally the call goes to the controller method <span class="notranslate">'getOne'</span>, and in the controller itself, the method is <span class="notranslate">'actionGetOne'</span>.
</p>

<?= Paragraph::h2('ApiPageManagerTrait') ?>

<p>
    Implements the often necessary function of pagination for displayed data.
    Adds a method <span class="notranslate">'getPageInterval'</span>, which transforms pagination data into a more convenient format.
    This calculates the initial value of the selection, which is convenient for working with the database.
</p>

<?= Paragraph::h2('ApiRequestDataManagerTrait') ?>

<p>
    Adds a method <span class="notranslate">'check'</span> that allows checking data in one array against conditions from another.
    Using this trait provides the ability to verify any incoming data that has been transformed into an array, whether they are <span class="notranslate">POST</span> request parameters or <span class="notranslate">JSON Body</span>.
    There is a list of possible conditions by which you can verify the data, composed by the developer.
    For example (<span class="notranslate">Request::input()</span> for the <span class="notranslate">HLEB2</span> framework returns a <span class="notranslate">JSON Body</span> array):
</p>

<?= Code::fromFile('@views/docs/code/extra/libraries/api/api.check.body.php', false);  ?>

<p>
    <span class="notranslate"><b>required</b></span> - a required field, always located at the beginning.
</p>
<p>
    List of possible types (<span class="notranslate">'type'</span> - must be in the first position or directly after <span class="notranslate">required</span>):<br>
    <span class="notranslate"><b>string</b></span> - checks for the presence of a string value, constraints can be <span class="notranslate">minlength</span> and <span class="notranslate">maxlength</span>.<br>
    <span class="notranslate"><b>float</b></span> - checks for the <span class="notranslate">float(double)</span> type, constraints can be <span class="notranslate">max</span> and <span class="notranslate">min</span>.<br>
    <span class="notranslate"><b>int</b></span> - checks for the <span class="notranslate">int(integer)</span> type, constraints can be <span class="notranslate">max</span> and <span class="notranslate">min</span>.<br>
    <span class="notranslate"><b>regex</b></span> - checks against a regular expression, for example <span class="notranslate">'regex:[0-9]+'</span>.<br>
    <span class="notranslate"><b>fullregex</b></span> - checks against a full regular expression, similar to <span class="notranslate">'fullregex:/^[0-9]+$/i'</span>, must be enclosed with slashes and can contain the characters : and |, unlike the simpler <span class="notranslate">regex</span>.<br>
    <span class="notranslate"><b>bool</b></span> - checks for a boolean value, only <span class="notranslate">true</span> or <span class="notranslate">false</span>.<br>
    <span class="notranslate"><b>null</b></span> - checks for <span class="notranslate">null</span> as a valid value.<br>
    <span class="notranslate"><b>void</b></span> - checks for an empty string as a valid value.<br>
</p>
<p>
    Type for enumerations:<br>
    <span class="notranslate"><b>enum</b></span> - searches among possible values, for example <span class="notranslate">'enum:1,2,3,4,south,east,north,west'</span>.<br>
    The check for equality is not strict, so both 4 and '4' are correct; for exact matching, it is better to accompany it with a type check.
</p>
<p>
<p>
    You can add two or more types, and they will be checked against all common conditions inclusively, for example, <span class="notranslate">'type:string,null,void|minlen:5'</span> - this means that the string should be checked, at least 5 characters long, or empty, or <span class="notranslate">null</span> value. In all other cases, it returns <span class="notranslate">false</span> as a result of a failed validation check.
</p>
<p>
    You can also check an array of fields with a list of standard array fields (they will be checked according to a unified template):
</p>

<?= Code::fromFile('@views/docs/code/extra/libraries/api/api.check.array.php', false);  ?>

<p>
    To check values of nested arrays in the check array, the name is specified in square brackets.
</p>

<?= Code::fromFile('@views/docs/code/extra/libraries/api/api.check.example.php', false);  ?>

<p>
    The above condition will return a successful check considering the nesting.
</p>

<?= Paragraph::h2('Testing') ?>

<p>
    The <span class="notranslate">API</span> traits were tested using <a href="https://github.com/phphleb/api-tests" target="_blank">github.com/phphleb/api-tests</a>
</p>

<?php insertTemplate('/docs/en/authors'); ?>

<?php insertTemplate('/docs/en/footer'); ?>

