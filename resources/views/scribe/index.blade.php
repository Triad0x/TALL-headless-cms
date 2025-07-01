<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Blog headless CMS API Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "http://localhost";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-5.2.1.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-5.2.1.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-categories-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="categories-endpoints">
                    <a href="#categories-endpoints">Categories endpoints</a>
                </li>
                                    <ul id="tocify-subheader-categories-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="categories-endpoints-GETapi-categories">
                                <a href="#categories-endpoints-GETapi-categories">GET api/categories</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="categories-endpoints-GETapi-categories--id-">
                                <a href="#categories-endpoints-GETapi-categories--id-">GET api/categories/{id}</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-user">
                                <a href="#endpoints-GETapi-user">GET api/user</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-pages-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="pages-endpoints">
                    <a href="#pages-endpoints">Pages endpoints</a>
                </li>
                                    <ul id="tocify-subheader-pages-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="pages-endpoints-GETapi-pages">
                                <a href="#pages-endpoints-GETapi-pages">GET api/pages</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="pages-endpoints-GETapi-pages--id-">
                                <a href="#pages-endpoints-GETapi-pages--id-">GET api/pages/{id}</a>
                            </li>
                                                                        </ul>
                            </ul>
                    <ul id="tocify-header-posts-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="posts-endpoints">
                    <a href="#posts-endpoints">Posts endpoints</a>
                </li>
                                    <ul id="tocify-subheader-posts-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="posts-endpoints-GETapi-posts">
                                <a href="#posts-endpoints-GETapi-posts">GET api/posts</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="posts-endpoints-GETapi-posts--id-">
                                <a href="#posts-endpoints-GETapi-posts--id-">GET api/posts/{id}</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: July 1, 2025</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<aside>
    <strong>Base URL</strong>: <code>http://localhost</code>
</aside>
<pre><code>This documentation aims to provide all the information you need to work with our API.

&lt;aside&gt;As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).&lt;/aside&gt;</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>This API is not authenticated.</p>

        <h1 id="categories-endpoints">Categories endpoints</h1>

    

                                <h2 id="categories-endpoints-GETapi-categories">GET api/categories</h2>

<p>
</p>



<span id="example-requests-GETapi-categories">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/categories?limit=10&amp;page=1&amp;sort=desc&amp;sort_by=id" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/categories"
);

const params = {
    "limit": "10",
    "page": "1",
    "sort": "desc",
    "sort_by": "id",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-categories">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 5,
            &quot;name&quot;: &quot;Crypto&quot;,
            &quot;slug&quot;: &quot;crypto&quot;,
            &quot;created_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;
        },
        {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;Entertainment&quot;,
            &quot;slug&quot;: &quot;entertainment&quot;,
            &quot;created_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Sport&quot;,
            &quot;slug&quot;: &quot;sport&quot;,
            &quot;created_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;health&quot;,
            &quot;slug&quot;: &quot;health&quot;,
            &quot;created_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;
        },
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Tech&quot;,
            &quot;slug&quot;: &quot;tech&quot;,
            &quot;created_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;
        }
    ],
    &quot;links&quot;: {
        &quot;first&quot;: &quot;http://localhost/api/categories?page=1&quot;,
        &quot;last&quot;: &quot;http://localhost/api/categories?page=1&quot;,
        &quot;prev&quot;: null,
        &quot;next&quot;: null
    },
    &quot;meta&quot;: {
        &quot;current_page&quot;: 1,
        &quot;from&quot;: 1,
        &quot;last_page&quot;: 1,
        &quot;links&quot;: [
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://localhost/api/categories?page=1&quot;,
                &quot;label&quot;: &quot;1&quot;,
                &quot;active&quot;: true
            },
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                &quot;active&quot;: false
            }
        ],
        &quot;path&quot;: &quot;http://localhost/api/categories&quot;,
        &quot;per_page&quot;: 10,
        &quot;to&quot;: 5,
        &quot;total&quot;: 5
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-categories" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-categories"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-categories"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-categories" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-categories">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-categories" data-method="GET"
      data-path="api/categories"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-categories', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-categories"
                    onclick="tryItOut('GETapi-categories');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-categories"
                    onclick="cancelTryOut('GETapi-categories');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-categories"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/categories</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-categories"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-categories"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>limit</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="limit"                data-endpoint="GETapi-categories"
               value="10"
               data-component="query">
    <br>
<p>Number of items per page. Must be at least 1. Must not be greater than 100. Example: <code>10</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="page"                data-endpoint="GETapi-categories"
               value="1"
               data-component="query">
    <br>
<p>The page number. Must be at least 1. Example: <code>1</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="sort"                data-endpoint="GETapi-categories"
               value="desc"
               data-component="query">
    <br>
<p>Sort direction (asc or desc). Example: <code>desc</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>asc</code></li> <li><code>desc</code></li></ul>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort_by</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="sort_by"                data-endpoint="GETapi-categories"
               value="id"
               data-component="query">
    <br>
<p>Field to sort the result by. Example: <code>id</code></p>
            </div>
                </form>

                    <h2 id="categories-endpoints-GETapi-categories--id-">GET api/categories/{id}</h2>

<p>
</p>



<span id="example-requests-GETapi-categories--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/categories/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/categories/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-categories--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;name&quot;: &quot;Tech&quot;,
        &quot;slug&quot;: &quot;tech&quot;,
        &quot;created_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-categories--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-categories--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-categories--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-categories--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-categories--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-categories--id-" data-method="GET"
      data-path="api/categories/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-categories--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-categories--id-"
                    onclick="tryItOut('GETapi-categories--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-categories--id-"
                    onclick="cancelTryOut('GETapi-categories--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-categories--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/categories/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-categories--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-categories--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-categories--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the category. Example: <code>1</code></p>
            </div>
                    </form>

                <h1 id="endpoints">Endpoints</h1>

    

                                <h2 id="endpoints-GETapi-user">GET api/user</h2>

<p>
</p>



<span id="example-requests-GETapi-user">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/user" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/user"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-user">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Unauthenticated.&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-user" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-user"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-user"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-user" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-user">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-user" data-method="GET"
      data-path="api/user"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-user', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-user"
                    onclick="tryItOut('GETapi-user');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-user"
                    onclick="cancelTryOut('GETapi-user');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-user"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/user</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-user"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-user"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                <h1 id="pages-endpoints">Pages endpoints</h1>

    

                                <h2 id="pages-endpoints-GETapi-pages">GET api/pages</h2>

<p>
</p>



<span id="example-requests-GETapi-pages">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/pages?limit=10&amp;page=1&amp;sort=desc&amp;sort_by=id" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/pages"
);

const params = {
    "limit": "10",
    "page": "1",
    "sort": "desc",
    "sort_by": "id",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-pages">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 16,
            &quot;title&quot;: &quot;New page thing&quot;,
            &quot;slug&quot;: &quot;new-page-thing&quot;,
            &quot;body&quot;: &quot;This is new page desc&quot;,
            &quot;status&quot;: &quot;published&quot;,
            &quot;created_at&quot;: &quot;2025-07-01T00:11:06.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-07-01T00:11:06.000000Z&quot;
        },
        {
            &quot;id&quot;: 15,
            &quot;title&quot;: &quot;Cumque non quas voluptatem.&quot;,
            &quot;slug&quot;: &quot;cumque-non-quas-voluptatem&quot;,
            &quot;body&quot;: &quot;Porro asperiores exercitationem eius odio. Fugit temporibus totam distinctio suscipit numquam qui. Ea sit pariatur porro quod modi suscipit ipsa. Incidunt autem consequatur officia molestiae ea sequi eius.\n\nNobis a veniam et ex omnis et. Adipisci saepe quidem quo voluptas ea. Quisquam excepturi aut et. Quod maiores deleniti et sunt maiores impedit. Sit repellendus omnis ad.\n\nSed natus aut numquam dicta ipsam et. Quia aliquam ut quod facere in. Animi iure quisquam labore et libero culpa qui atque.&quot;,
            &quot;status&quot;: &quot;draft&quot;,
            &quot;created_at&quot;: &quot;2025-06-30T23:40:22.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-30T23:40:22.000000Z&quot;
        },
        {
            &quot;id&quot;: 14,
            &quot;title&quot;: &quot;Ex dolorem rem error sed non vero.&quot;,
            &quot;slug&quot;: &quot;ex-dolorem-rem-error-sed-non-vero&quot;,
            &quot;body&quot;: &quot;Officiis fugit non consequatur qui. Nostrum enim architecto doloribus expedita et.\n\nId cupiditate et doloremque aliquam fugiat rerum. Facere quibusdam optio alias reprehenderit. Quis similique quidem eum ut.\n\nVitae et voluptatem possimus suscipit possimus ipsa officiis. Sunt ab eius quia. Quibusdam sequi earum accusamus est. Dolores minima quo voluptatem sed hic.&quot;,
            &quot;status&quot;: &quot;draft&quot;,
            &quot;created_at&quot;: &quot;2025-06-30T23:40:22.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-30T23:40:22.000000Z&quot;
        },
        {
            &quot;id&quot;: 13,
            &quot;title&quot;: &quot;Dolor sint consequatur consequuntur totam sit minus optio.&quot;,
            &quot;slug&quot;: &quot;dolor-sint-consequatur-consequuntur-totam-sit-minus-optio&quot;,
            &quot;body&quot;: &quot;Consequatur reprehenderit ratione optio non nihil. Rem deleniti quibusdam voluptas omnis dignissimos ut voluptatem non. Illo rerum voluptatem ut. Nulla sed saepe distinctio ut consequatur dolor explicabo.\n\nBeatae in et error eaque est perferendis qui. Consectetur corporis illo qui. Molestiae recusandae accusamus occaecati ratione laboriosam et. Explicabo perspiciatis aut laboriosam sit nostrum unde odio velit.\n\nDolorum vitae nulla quia optio id voluptatum. Nihil sed totam earum. Excepturi qui eveniet vel animi.&quot;,
            &quot;status&quot;: &quot;draft&quot;,
            &quot;created_at&quot;: &quot;2025-06-30T23:40:22.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-30T23:40:22.000000Z&quot;
        },
        {
            &quot;id&quot;: 12,
            &quot;title&quot;: &quot;Et fuga veritatis quia et a ipsum ut.&quot;,
            &quot;slug&quot;: &quot;et-fuga-veritatis-quia-et-a-ipsum-ut&quot;,
            &quot;body&quot;: &quot;Tenetur et eaque qui laudantium libero reprehenderit. Id inventore et totam sed dolorem et. Porro qui dignissimos dolores in accusantium quis nam inventore.\n\nEst impedit eum ad omnis laborum. Dolorem maxime incidunt qui placeat rerum praesentium sed. Non doloremque soluta enim consequuntur. Laborum dolores animi doloribus voluptas ut. Et est est laborum quas molestiae alias accusantium.\n\nPerferendis dicta occaecati aliquid ipsa laborum. Officia culpa repudiandae et saepe saepe. Id error atque nobis nulla. Id aut mollitia aut. Odit et placeat cum eligendi eos qui accusantium.&quot;,
            &quot;status&quot;: &quot;published&quot;,
            &quot;created_at&quot;: &quot;2025-06-30T23:40:22.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-30T23:40:22.000000Z&quot;
        },
        {
            &quot;id&quot;: 11,
            &quot;title&quot;: &quot;Quisquam officia qui itaque provident rerum minima accusantium.&quot;,
            &quot;slug&quot;: &quot;quisquam-officia-qui-itaque-provident-rerum-minima-accusantium&quot;,
            &quot;body&quot;: &quot;Temporibus velit eos iure harum voluptas voluptas. Sequi inventore qui consectetur enim neque fuga non amet. Nihil qui labore saepe nihil enim facilis. Commodi atque accusantium quos maxime eaque voluptatem eos odio.\n\nFacilis nihil nisi ducimus quos quas quia perspiciatis. Sit aut ex rerum iure dignissimos. Accusamus vel delectus in rerum atque.\n\nRem aliquam reiciendis non ducimus. Dolore ut nostrum eveniet est. Magnam sequi ut eius eos explicabo sed est.&quot;,
            &quot;status&quot;: &quot;draft&quot;,
            &quot;created_at&quot;: &quot;2025-06-30T23:40:22.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-30T23:40:22.000000Z&quot;
        },
        {
            &quot;id&quot;: 10,
            &quot;title&quot;: &quot;Quia amet animi quidem magni a.&quot;,
            &quot;slug&quot;: &quot;quia-amet-animi-quidem-magni-a&quot;,
            &quot;body&quot;: &quot;Repudiandae ducimus quam adipisci. Saepe molestias perferendis ut et et. Quod perspiciatis ea repellendus veniam. Et rerum culpa consequatur culpa saepe velit vel.\n\nEveniet sed nesciunt id. Nisi sit doloribus similique minus dolorem quis rerum.\n\nVoluptate molestiae laborum necessitatibus ut libero aut. Tempore reiciendis voluptatem similique fugiat nostrum quis exercitationem. Et nulla enim molestiae ducimus saepe. Quia sed consectetur pariatur laboriosam voluptas dolores.&quot;,
            &quot;status&quot;: &quot;published&quot;,
            &quot;created_at&quot;: &quot;2025-06-30T23:40:22.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-30T23:40:22.000000Z&quot;
        },
        {
            &quot;id&quot;: 9,
            &quot;title&quot;: &quot;Alias minus mollitia cumque in qui.&quot;,
            &quot;slug&quot;: &quot;alias-minus-mollitia-cumque-in-qui&quot;,
            &quot;body&quot;: &quot;Eum recusandae qui numquam voluptates autem praesentium. Eum voluptate eligendi ex qui consequuntur quis saepe. Quibusdam quis sequi aperiam omnis. Nihil veniam optio animi sint consequatur.\n\nQuos voluptates doloribus quidem ipsam fugiat consequatur. Sit quis dolorem laudantium qui sed. Et praesentium eius incidunt officia et veniam dolorem.\n\nNumquam repellat doloribus eum id laborum. Exercitationem voluptatem similique doloremque sit sed dolorum. Assumenda tenetur ullam et omnis fugit voluptas sit possimus. Dolor maiores mollitia dolores pariatur dolorum accusamus.&quot;,
            &quot;status&quot;: &quot;draft&quot;,
            &quot;created_at&quot;: &quot;2025-06-30T23:40:22.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-30T23:40:22.000000Z&quot;
        },
        {
            &quot;id&quot;: 8,
            &quot;title&quot;: &quot;Iure nulla debitis ipsum illo ad voluptas blanditiis.&quot;,
            &quot;slug&quot;: &quot;iure-nulla-debitis-ipsum-illo-ad-voluptas-blanditiis&quot;,
            &quot;body&quot;: &quot;Similique reprehenderit eligendi et sequi deleniti consequuntur quis. Nobis expedita porro laborum magni voluptatibus. Omnis cumque deserunt qui repellendus. Omnis ut corrupti consectetur iusto minima.\n\nOdio ut neque officia eligendi qui ea consequuntur autem. Repudiandae qui quas sunt et soluta aut officia. Qui consequuntur eos id in sequi harum aut.\n\nPraesentium porro laborum fuga harum enim nemo qui possimus. Voluptas at cum nisi cupiditate impedit omnis. Commodi consectetur rerum animi vel non tempore eum.&quot;,
            &quot;status&quot;: &quot;draft&quot;,
            &quot;created_at&quot;: &quot;2025-06-30T23:40:22.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-30T23:40:22.000000Z&quot;
        },
        {
            &quot;id&quot;: 7,
            &quot;title&quot;: &quot;Expedita necessitatibus cum aut mollitia.&quot;,
            &quot;slug&quot;: &quot;expedita-necessitatibus-cum-aut-mollitia&quot;,
            &quot;body&quot;: &quot;Ut laborum quis mollitia delectus et. Et id et sed. Eaque qui occaecati adipisci provident qui ut omnis. Modi rerum distinctio omnis soluta maiores est.\n\nAut minus perspiciatis deserunt impedit ipsa. Itaque quas dolorum impedit natus expedita consequatur dolorem. Repellendus dolores id non sapiente.\n\nSint est voluptas odio voluptatem sit. Totam aut esse neque quia aut delectus. Distinctio animi aut sed sed numquam velit eos et.&quot;,
            &quot;status&quot;: &quot;published&quot;,
            &quot;created_at&quot;: &quot;2025-06-30T23:40:22.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-30T23:40:22.000000Z&quot;
        }
    ],
    &quot;links&quot;: {
        &quot;first&quot;: &quot;http://localhost/api/pages?page=1&quot;,
        &quot;last&quot;: &quot;http://localhost/api/pages?page=2&quot;,
        &quot;prev&quot;: null,
        &quot;next&quot;: &quot;http://localhost/api/pages?page=2&quot;
    },
    &quot;meta&quot;: {
        &quot;current_page&quot;: 1,
        &quot;from&quot;: 1,
        &quot;last_page&quot;: 2,
        &quot;links&quot;: [
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://localhost/api/pages?page=1&quot;,
                &quot;label&quot;: &quot;1&quot;,
                &quot;active&quot;: true
            },
            {
                &quot;url&quot;: &quot;http://localhost/api/pages?page=2&quot;,
                &quot;label&quot;: &quot;2&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://localhost/api/pages?page=2&quot;,
                &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                &quot;active&quot;: false
            }
        ],
        &quot;path&quot;: &quot;http://localhost/api/pages&quot;,
        &quot;per_page&quot;: 10,
        &quot;to&quot;: 10,
        &quot;total&quot;: 16
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-pages" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-pages"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-pages"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-pages" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-pages">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-pages" data-method="GET"
      data-path="api/pages"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-pages', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-pages"
                    onclick="tryItOut('GETapi-pages');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-pages"
                    onclick="cancelTryOut('GETapi-pages');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-pages"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/pages</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-pages"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-pages"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>limit</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="limit"                data-endpoint="GETapi-pages"
               value="10"
               data-component="query">
    <br>
<p>Number of items per page. Must be at least 1. Must not be greater than 100. Example: <code>10</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="page"                data-endpoint="GETapi-pages"
               value="1"
               data-component="query">
    <br>
<p>The page number. Must be at least 1. Example: <code>1</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="sort"                data-endpoint="GETapi-pages"
               value="desc"
               data-component="query">
    <br>
<p>Sort direction (asc or desc). Example: <code>desc</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>asc</code></li> <li><code>desc</code></li></ul>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort_by</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="sort_by"                data-endpoint="GETapi-pages"
               value="id"
               data-component="query">
    <br>
<p>Field to sort the result by. Example: <code>id</code></p>
            </div>
                </form>

                    <h2 id="pages-endpoints-GETapi-pages--id-">GET api/pages/{id}</h2>

<p>
</p>



<span id="example-requests-GETapi-pages--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/pages/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/pages/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-pages--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;title&quot;: &quot;Accusantium pariatur suscipit maxime quia ab deserunt omnis.&quot;,
        &quot;slug&quot;: &quot;accusantium-pariatur-suscipit-maxime-quia-ab-deserunt-omnis&quot;,
        &quot;body&quot;: &quot;Et possimus ut unde. Temporibus repudiandae blanditiis voluptas officia fugit sed totam officiis. Occaecati ratione asperiores neque nobis ut.\n\nEaque dolore culpa consequatur culpa at iure. Sed laborum ad aut velit.\n\nAutem exercitationem et aliquid ducimus at molestiae modi minus. Voluptates doloremque voluptatem recusandae unde aut. Facilis ut excepturi eum asperiores voluptatem reprehenderit.&quot;,
        &quot;status&quot;: &quot;draft&quot;,
        &quot;created_at&quot;: &quot;2025-06-30T23:40:22.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-06-30T23:40:22.000000Z&quot;
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-pages--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-pages--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-pages--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-pages--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-pages--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-pages--id-" data-method="GET"
      data-path="api/pages/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-pages--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-pages--id-"
                    onclick="tryItOut('GETapi-pages--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-pages--id-"
                    onclick="cancelTryOut('GETapi-pages--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-pages--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/pages/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-pages--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-pages--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-pages--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the page. Example: <code>1</code></p>
            </div>
                    </form>

                <h1 id="posts-endpoints">Posts endpoints</h1>

    

                                <h2 id="posts-endpoints-GETapi-posts">GET api/posts</h2>

<p>
</p>



<span id="example-requests-GETapi-posts">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/posts?limit=10&amp;page=1&amp;sort=desc&amp;sort_by=id" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/posts"
);

const params = {
    "limit": "10",
    "page": "1",
    "sort": "desc",
    "sort_by": "id",
};
Object.keys(params)
    .forEach(key =&gt; url.searchParams.append(key, params[key]));

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-posts">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 20,
            &quot;title&quot;: &quot;Mollitia est culpa in dicta officia non.&quot;,
            &quot;slug&quot;: &quot;mollitia-est-culpa-in-dicta-officia-non&quot;,
            &quot;content&quot;: &quot;Eius aut libero id consectetur. Odio officia voluptates qui. Occaecati libero rerum sint molestiae sunt. Et animi ea voluptatem sit et quaerat dolore.\n\nRepellat quia numquam repudiandae quis non. Corporis sint quam ut aut. Non dolor ullam aliquam minus. Sit qui consequatur itaque error consequatur quia nobis. Deserunt tempora quis placeat nobis.\n\nConsequatur corrupti sit sint et consequatur voluptas. Assumenda tenetur modi vero eaque eius nesciunt distinctio. Eius alias sed id quas voluptas officiis. Voluptatibus quas dolores sapiente pariatur nisi.\n\nVoluptatem et dolorem et corporis. Quis enim quasi esse rem laudantium enim. Ipsa sed sint architecto veritatis pariatur. Commodi et et ipsa eius ut quo.\n\nQuibusdam dolor maxime ipsa nemo aut ab sit exercitationem. Ad dolor ut repellendus et dolore. Doloribus saepe numquam officia assumenda libero ut quisquam. Eum qui optio fuga voluptates magnam repudiandae modi odio.&quot;,
            &quot;short_description&quot;: &quot;Et laudantium qui sequi.&quot;,
            &quot;image_url&quot;: &quot;http://localhost/storage/posts/mollitia-est-culpa-in-dicta-officia-non/main.jpg&quot;,
            &quot;status&quot;: &quot;published&quot;,
            &quot;published_at&quot;: &quot;2025-03-09T22:49:01.000000Z&quot;,
            &quot;created_at&quot;: &quot;2025-06-30T23:40:22.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-30T23:45:49.000000Z&quot;,
            &quot;categories&quot;: [
                {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;Sport&quot;,
                    &quot;slug&quot;: &quot;sport&quot;,
                    &quot;created_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;
                },
                {
                    &quot;id&quot;: 4,
                    &quot;name&quot;: &quot;Entertainment&quot;,
                    &quot;slug&quot;: &quot;entertainment&quot;,
                    &quot;created_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;
                },
                {
                    &quot;id&quot;: 5,
                    &quot;name&quot;: &quot;Crypto&quot;,
                    &quot;slug&quot;: &quot;crypto&quot;,
                    &quot;created_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;
                }
            ]
        },
        {
            &quot;id&quot;: 19,
            &quot;title&quot;: &quot;Ut consectetur molestiae voluptatibus tempore non.&quot;,
            &quot;slug&quot;: &quot;ut-consectetur-molestiae-voluptatibus-tempore-non&quot;,
            &quot;content&quot;: &quot;Nulla laborum ab consequatur non. Rerum alias ratione aspernatur aut nostrum magnam.\n\nVoluptas quo animi a voluptatum aut. Deserunt molestias blanditiis similique corporis. Qui dignissimos laborum similique tempore ut sit. Reiciendis quae deserunt in vitae repellat voluptas voluptatem.\n\nNumquam voluptatem non earum porro sunt quo exercitationem. Ut optio praesentium culpa non maiores quia eos quibusdam. Quos officia molestias fuga ipsum tempore. Vel quibusdam omnis adipisci repellat.\n\nAutem magni aut modi fugiat. Ducimus est facilis est. Quisquam eius aspernatur voluptas eum ipsam. Ut porro non natus facilis ratione deleniti expedita voluptatem.\n\nOmnis nemo quia culpa est qui maiores. Delectus placeat illum quis quis. Sunt enim non quo voluptas officiis officiis modi molestiae. Reprehenderit temporibus sed rerum numquam magnam.&quot;,
            &quot;short_description&quot;: &quot;Laboriosam ut ut repudiandae deleniti aut praesentium.&quot;,
            &quot;image_url&quot;: &quot;http://localhost/storage/posts&quot;,
            &quot;status&quot;: &quot;draft&quot;,
            &quot;published_at&quot;: &quot;2024-10-31T18:14:11.000000Z&quot;,
            &quot;created_at&quot;: &quot;2025-06-30T23:40:22.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-30T23:40:22.000000Z&quot;,
            &quot;categories&quot;: [
                {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Tech&quot;,
                    &quot;slug&quot;: &quot;tech&quot;,
                    &quot;created_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;
                },
                {
                    &quot;id&quot;: 4,
                    &quot;name&quot;: &quot;Entertainment&quot;,
                    &quot;slug&quot;: &quot;entertainment&quot;,
                    &quot;created_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;
                },
                {
                    &quot;id&quot;: 5,
                    &quot;name&quot;: &quot;Crypto&quot;,
                    &quot;slug&quot;: &quot;crypto&quot;,
                    &quot;created_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;
                }
            ]
        },
        {
            &quot;id&quot;: 18,
            &quot;title&quot;: &quot;Doloribus maxime voluptas nisi ab autem.&quot;,
            &quot;slug&quot;: &quot;doloribus-maxime-voluptas-nisi-ab-autem&quot;,
            &quot;content&quot;: &quot;Sed dolorem animi porro. Aperiam laboriosam dolorem error sit nihil iure. Unde dolore architecto qui necessitatibus nostrum repellendus. Totam minima ipsum nesciunt aut cum doloribus similique. Veritatis vitae eos vel voluptatum ipsam.\n\nDeleniti in cumque voluptatum deserunt ducimus dolor quas. Distinctio sit quo ut aut. Adipisci et ut exercitationem aut quia. Ex voluptas fugit hic accusantium ad sunt harum.\n\nMaiores excepturi praesentium deserunt maxime aspernatur est et. Harum assumenda optio nisi qui in et ipsa. Deserunt labore rerum iure eaque quae nostrum omnis et. Aut labore et aut quis ex iure.\n\nCum sequi eos incidunt nostrum. Voluptas dolores est ipsum vitae quia. Nisi et doloremque voluptatem iste.\n\nSoluta quas aut unde iusto recusandae in rerum. Non ex cumque modi quia. Accusamus velit veniam eum qui.&quot;,
            &quot;short_description&quot;: &quot;Est dolorem minus deserunt vero ut earum qui.&quot;,
            &quot;image_url&quot;: &quot;http://localhost/storage/posts&quot;,
            &quot;status&quot;: &quot;draft&quot;,
            &quot;published_at&quot;: &quot;2024-11-16T01:24:44.000000Z&quot;,
            &quot;created_at&quot;: &quot;2025-06-30T23:40:22.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-30T23:40:22.000000Z&quot;,
            &quot;categories&quot;: [
                {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Tech&quot;,
                    &quot;slug&quot;: &quot;tech&quot;,
                    &quot;created_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;
                },
                {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;health&quot;,
                    &quot;slug&quot;: &quot;health&quot;,
                    &quot;created_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;
                },
                {
                    &quot;id&quot;: 5,
                    &quot;name&quot;: &quot;Crypto&quot;,
                    &quot;slug&quot;: &quot;crypto&quot;,
                    &quot;created_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;
                }
            ]
        },
        {
            &quot;id&quot;: 17,
            &quot;title&quot;: &quot;Quia et totam suscipit quod minus est aspernatur id.&quot;,
            &quot;slug&quot;: &quot;quia-et-totam-suscipit-quod-minus-est-aspernatur-id&quot;,
            &quot;content&quot;: &quot;Eligendi quis odio temporibus sequi enim. Quas soluta placeat labore vel doloribus. Ut provident eos voluptas minus. Commodi deleniti minus omnis consequatur consequatur non voluptas officia.\n\nIn vitae sit labore quam. Temporibus aut et velit accusantium itaque ut deleniti. Doloremque veritatis soluta et facere at autem velit libero.\n\nMolestias voluptatem est enim quis doloremque officiis omnis. Deserunt temporibus ipsam ut possimus impedit rerum.\n\nAutem consequatur suscipit reiciendis quisquam. Quia aspernatur itaque occaecati voluptates qui. Quia modi sint consectetur et.\n\nBlanditiis quisquam velit repellat qui animi quas. Numquam culpa nobis reprehenderit et nisi quos. Autem architecto doloribus in beatae et fugit. Reiciendis reprehenderit similique qui.&quot;,
            &quot;short_description&quot;: &quot;Non dolorem cumque doloremque quis eos voluptatum ipsa.&quot;,
            &quot;image_url&quot;: &quot;http://localhost/storage/posts&quot;,
            &quot;status&quot;: &quot;published&quot;,
            &quot;published_at&quot;: &quot;2024-07-22T14:26:46.000000Z&quot;,
            &quot;created_at&quot;: &quot;2025-06-30T23:40:22.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-30T23:40:22.000000Z&quot;,
            &quot;categories&quot;: [
                {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;health&quot;,
                    &quot;slug&quot;: &quot;health&quot;,
                    &quot;created_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;
                }
            ]
        },
        {
            &quot;id&quot;: 16,
            &quot;title&quot;: &quot;Atque blanditiis natus eaque voluptas ea nam.&quot;,
            &quot;slug&quot;: &quot;atque-blanditiis-natus-eaque-voluptas-ea-nam&quot;,
            &quot;content&quot;: &quot;Minus non molestiae placeat neque esse. Ut et ea facere similique debitis. Et sint sed veniam. Quos aliquid quis minima est amet.\n\nAlias impedit ducimus magni ratione et neque omnis. In accusamus commodi minima culpa. Qui ut inventore adipisci consequatur quas fugiat et. Ut assumenda quia est repellendus magnam.\n\nSunt dolorem neque nemo quis sit aut non excepturi. Laborum accusantium officiis beatae facere inventore error aut neque. Qui aut ipsa occaecati incidunt est qui ducimus iure.\n\nAliquam rerum eveniet numquam quidem sed. Eius vitae inventore quos numquam. Eaque est ut mollitia et.\n\nEt porro et laudantium a. Quo illum quam ipsam est est laboriosam quos aut.&quot;,
            &quot;short_description&quot;: &quot;Veritatis et eligendi debitis aut.&quot;,
            &quot;image_url&quot;: &quot;http://localhost/storage/posts&quot;,
            &quot;status&quot;: &quot;published&quot;,
            &quot;published_at&quot;: &quot;2025-05-06T15:59:05.000000Z&quot;,
            &quot;created_at&quot;: &quot;2025-06-30T23:40:22.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-30T23:40:22.000000Z&quot;,
            &quot;categories&quot;: [
                {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Tech&quot;,
                    &quot;slug&quot;: &quot;tech&quot;,
                    &quot;created_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;
                },
                {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;health&quot;,
                    &quot;slug&quot;: &quot;health&quot;,
                    &quot;created_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;
                }
            ]
        },
        {
            &quot;id&quot;: 15,
            &quot;title&quot;: &quot;Error placeat non libero dignissimos.&quot;,
            &quot;slug&quot;: &quot;error-placeat-non-libero-dignissimos&quot;,
            &quot;content&quot;: &quot;Adipisci suscipit id ut quo dicta. Quisquam praesentium voluptatibus modi id sapiente. Ducimus et inventore ut eum.\n\nPerspiciatis itaque accusantium voluptas sed. Sed illum cum incidunt vel. Blanditiis quia sequi incidunt est nam possimus. Aut quibusdam ratione facilis saepe voluptatem.\n\nAdipisci doloribus qui est et. Tenetur fugiat et assumenda dolorem exercitationem consequatur. Et est rerum consectetur totam est voluptatum. Quasi enim et aut aut ut ut.\n\nSapiente sit eos aspernatur maiores ut reprehenderit. Voluptatum at quasi consequatur. Cupiditate omnis sunt consequatur at ad quidem sequi. Modi corrupti et possimus quis.\n\nVoluptas asperiores id sint aut voluptas quasi. Et ut qui quos vel quidem esse. Molestias qui labore eum magnam quae aut ut. Explicabo dolorem accusamus aut ut minus.&quot;,
            &quot;short_description&quot;: &quot;Animi velit id voluptatem enim repellendus sit et.&quot;,
            &quot;image_url&quot;: &quot;http://localhost/storage/posts&quot;,
            &quot;status&quot;: &quot;published&quot;,
            &quot;published_at&quot;: &quot;2024-08-08T15:31:25.000000Z&quot;,
            &quot;created_at&quot;: &quot;2025-06-30T23:40:22.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-30T23:40:22.000000Z&quot;,
            &quot;categories&quot;: [
                {
                    &quot;id&quot;: 4,
                    &quot;name&quot;: &quot;Entertainment&quot;,
                    &quot;slug&quot;: &quot;entertainment&quot;,
                    &quot;created_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;
                },
                {
                    &quot;id&quot;: 5,
                    &quot;name&quot;: &quot;Crypto&quot;,
                    &quot;slug&quot;: &quot;crypto&quot;,
                    &quot;created_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;
                }
            ]
        },
        {
            &quot;id&quot;: 14,
            &quot;title&quot;: &quot;Voluptas voluptate eum odit provident.&quot;,
            &quot;slug&quot;: &quot;voluptas-voluptate-eum-odit-provident&quot;,
            &quot;content&quot;: &quot;Officia eum sint saepe. Voluptatem consequatur et unde. Similique suscipit saepe nobis eos aut minima consequatur alias. Perferendis sit nisi reiciendis sapiente eaque odio atque.\n\nIpsa eveniet vitae minima aut ut et vel sit. Soluta at odio ex nostrum aut quia in. Modi assumenda vero consequatur vel ad ipsam.\n\nIste aut tempore amet eos. Qui est vel eligendi est amet error. Sint officiis ipsum et expedita id ut. Porro voluptatem quo deleniti est explicabo voluptatem.\n\nDolorem quasi ipsam commodi est. Est exercitationem omnis porro hic. Ipsa rerum inventore eum ut veritatis sunt nisi earum.\n\nQuia eaque soluta labore. Ipsa quis accusamus sed quidem sapiente. Dolorum eum officia qui quo consequatur molestiae. Nam ut suscipit tempora autem ut mollitia eos sed. Aut officia rerum sit qui quia.&quot;,
            &quot;short_description&quot;: &quot;Vel repudiandae error eos amet inventore aliquid autem.&quot;,
            &quot;image_url&quot;: &quot;http://localhost/storage/posts&quot;,
            &quot;status&quot;: &quot;published&quot;,
            &quot;published_at&quot;: &quot;2025-05-11T04:03:50.000000Z&quot;,
            &quot;created_at&quot;: &quot;2025-06-30T23:40:22.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-30T23:40:22.000000Z&quot;,
            &quot;categories&quot;: [
                {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;health&quot;,
                    &quot;slug&quot;: &quot;health&quot;,
                    &quot;created_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;
                },
                {
                    &quot;id&quot;: 5,
                    &quot;name&quot;: &quot;Crypto&quot;,
                    &quot;slug&quot;: &quot;crypto&quot;,
                    &quot;created_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;
                }
            ]
        },
        {
            &quot;id&quot;: 13,
            &quot;title&quot;: &quot;Iusto quae amet fuga et.&quot;,
            &quot;slug&quot;: &quot;iusto-quae-amet-fuga-et&quot;,
            &quot;content&quot;: &quot;Et est fugiat omnis voluptas. Et nostrum ut facilis veniam aut iste. Voluptatem non nam officia enim est voluptas ea ipsam. Esse nulla expedita cupiditate voluptate distinctio sunt provident doloremque.\n\nAsperiores voluptates necessitatibus sed. Inventore mollitia sint veritatis et nemo deserunt sequi. Aut excepturi reiciendis autem dolores quisquam. Dicta soluta itaque ipsum molestiae rerum pariatur quisquam.\n\nFugiat amet velit autem fugit iusto inventore. Ut aut amet quibusdam. Voluptatem consequatur fugiat ipsum.\n\nIllo molestiae ipsam minus quas. Aut et nesciunt omnis provident. Aspernatur dolores magni sequi et.\n\nCumque et sunt est quo rerum. Incidunt et tempora dicta asperiores illum vel. Inventore enim quidem qui voluptatem officiis nihil. Deleniti excepturi ratione repudiandae.&quot;,
            &quot;short_description&quot;: &quot;Voluptas nulla omnis quam.&quot;,
            &quot;image_url&quot;: &quot;http://localhost/storage/posts&quot;,
            &quot;status&quot;: &quot;published&quot;,
            &quot;published_at&quot;: &quot;2025-03-16T18:24:40.000000Z&quot;,
            &quot;created_at&quot;: &quot;2025-06-30T23:40:22.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-30T23:40:22.000000Z&quot;,
            &quot;categories&quot;: [
                {
                    &quot;id&quot;: 1,
                    &quot;name&quot;: &quot;Tech&quot;,
                    &quot;slug&quot;: &quot;tech&quot;,
                    &quot;created_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;
                },
                {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;health&quot;,
                    &quot;slug&quot;: &quot;health&quot;,
                    &quot;created_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;
                },
                {
                    &quot;id&quot;: 4,
                    &quot;name&quot;: &quot;Entertainment&quot;,
                    &quot;slug&quot;: &quot;entertainment&quot;,
                    &quot;created_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;
                }
            ]
        },
        {
            &quot;id&quot;: 12,
            &quot;title&quot;: &quot;Aut ut provident quisquam et aut amet vitae cum.&quot;,
            &quot;slug&quot;: &quot;aut-ut-provident-quisquam-et-aut-amet-vitae-cum&quot;,
            &quot;content&quot;: &quot;Eos excepturi aut aut nam dolorum. Odio qui aut qui dolor voluptatem et hic dolor. Corporis blanditiis aut deleniti aut alias ut dolorem.\n\nFacere error laudantium nostrum voluptatem nihil maxime. Unde accusamus non corrupti et. Sed nostrum numquam quis dolorem at optio.\n\nAccusamus pariatur deleniti veniam ratione quos veritatis. Placeat quis corporis et porro quasi ullam. Totam quam sit fugit inventore optio et. Aut quibusdam adipisci modi quasi.\n\nRepellat occaecati sit voluptas animi. Odio odio sed porro voluptates recusandae. Cum enim mollitia mollitia rerum cumque dolorem sequi voluptas. Illum amet voluptas ab harum blanditiis corrupti velit.\n\nOdit nesciunt accusantium non et omnis. Accusantium molestiae eum voluptas. Necessitatibus rerum rerum neque et doloribus est tempore consectetur.&quot;,
            &quot;short_description&quot;: &quot;Saepe id est et et.&quot;,
            &quot;image_url&quot;: &quot;http://localhost/storage/posts&quot;,
            &quot;status&quot;: &quot;draft&quot;,
            &quot;published_at&quot;: &quot;2024-09-15T05:32:55.000000Z&quot;,
            &quot;created_at&quot;: &quot;2025-06-30T23:40:22.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-30T23:40:22.000000Z&quot;,
            &quot;categories&quot;: [
                {
                    &quot;id&quot;: 3,
                    &quot;name&quot;: &quot;Sport&quot;,
                    &quot;slug&quot;: &quot;sport&quot;,
                    &quot;created_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;
                },
                {
                    &quot;id&quot;: 4,
                    &quot;name&quot;: &quot;Entertainment&quot;,
                    &quot;slug&quot;: &quot;entertainment&quot;,
                    &quot;created_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;
                },
                {
                    &quot;id&quot;: 5,
                    &quot;name&quot;: &quot;Crypto&quot;,
                    &quot;slug&quot;: &quot;crypto&quot;,
                    &quot;created_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;
                }
            ]
        },
        {
            &quot;id&quot;: 11,
            &quot;title&quot;: &quot;Totam adipisci voluptas et possimus nostrum hic vero sint.&quot;,
            &quot;slug&quot;: &quot;totam-adipisci-voluptas-et-possimus-nostrum-hic-vero-sint&quot;,
            &quot;content&quot;: &quot;Aliquid odio ea repudiandae quia excepturi. Repellat sed ducimus harum rerum. Voluptatem in aperiam repudiandae ut et consequatur.\n\nFugiat rem ut consequuntur aperiam voluptatem non. Debitis error harum voluptas ea commodi cum. Cumque qui officia voluptate qui id praesentium quo adipisci. Sed voluptas hic cupiditate in nemo nostrum perspiciatis.\n\nQuia molestiae dicta ea nihil in nemo. Vel beatae atque vero quos dolores cupiditate magni. Aliquid ut perspiciatis placeat hic ducimus ratione. Minima culpa eum enim ut enim rem eligendi praesentium.\n\nNumquam architecto itaque cupiditate eum. Itaque est veritatis sit incidunt illum molestias est. Aut et placeat rerum nemo ut.\n\nAut ullam non similique et. In dolorum dolorem recusandae. Dolorem sed molestiae possimus voluptatem. Est eius perspiciatis enim perspiciatis ipsa expedita.&quot;,
            &quot;short_description&quot;: &quot;Fugit adipisci magnam optio voluptas sed et.&quot;,
            &quot;image_url&quot;: &quot;http://localhost/storage/posts&quot;,
            &quot;status&quot;: &quot;published&quot;,
            &quot;published_at&quot;: &quot;2025-02-03T04:32:39.000000Z&quot;,
            &quot;created_at&quot;: &quot;2025-06-30T23:40:22.000000Z&quot;,
            &quot;updated_at&quot;: &quot;2025-06-30T23:40:22.000000Z&quot;,
            &quot;categories&quot;: [
                {
                    &quot;id&quot;: 2,
                    &quot;name&quot;: &quot;health&quot;,
                    &quot;slug&quot;: &quot;health&quot;,
                    &quot;created_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;
                },
                {
                    &quot;id&quot;: 4,
                    &quot;name&quot;: &quot;Entertainment&quot;,
                    &quot;slug&quot;: &quot;entertainment&quot;,
                    &quot;created_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;
                },
                {
                    &quot;id&quot;: 5,
                    &quot;name&quot;: &quot;Crypto&quot;,
                    &quot;slug&quot;: &quot;crypto&quot;,
                    &quot;created_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;,
                    &quot;updated_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;
                }
            ]
        }
    ],
    &quot;links&quot;: {
        &quot;first&quot;: &quot;http://localhost/api/posts?page=1&quot;,
        &quot;last&quot;: &quot;http://localhost/api/posts?page=2&quot;,
        &quot;prev&quot;: null,
        &quot;next&quot;: &quot;http://localhost/api/posts?page=2&quot;
    },
    &quot;meta&quot;: {
        &quot;current_page&quot;: 1,
        &quot;from&quot;: 1,
        &quot;last_page&quot;: 2,
        &quot;links&quot;: [
            {
                &quot;url&quot;: null,
                &quot;label&quot;: &quot;&amp;laquo; Previous&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://localhost/api/posts?page=1&quot;,
                &quot;label&quot;: &quot;1&quot;,
                &quot;active&quot;: true
            },
            {
                &quot;url&quot;: &quot;http://localhost/api/posts?page=2&quot;,
                &quot;label&quot;: &quot;2&quot;,
                &quot;active&quot;: false
            },
            {
                &quot;url&quot;: &quot;http://localhost/api/posts?page=2&quot;,
                &quot;label&quot;: &quot;Next &amp;raquo;&quot;,
                &quot;active&quot;: false
            }
        ],
        &quot;path&quot;: &quot;http://localhost/api/posts&quot;,
        &quot;per_page&quot;: 10,
        &quot;to&quot;: 10,
        &quot;total&quot;: 20
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-posts" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-posts"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-posts"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-posts" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-posts">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-posts" data-method="GET"
      data-path="api/posts"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-posts', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-posts"
                    onclick="tryItOut('GETapi-posts');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-posts"
                    onclick="cancelTryOut('GETapi-posts');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-posts"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/posts</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-posts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-posts"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Query Parameters</b></h4>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>limit</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="limit"                data-endpoint="GETapi-posts"
               value="10"
               data-component="query">
    <br>
<p>Number of items per page. Must be at least 1. Must not be greater than 100. Example: <code>10</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>page</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="number" style="display: none"
               step="any"               name="page"                data-endpoint="GETapi-posts"
               value="1"
               data-component="query">
    <br>
<p>The page number. Must be at least 1. Example: <code>1</code></p>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="sort"                data-endpoint="GETapi-posts"
               value="desc"
               data-component="query">
    <br>
<p>Sort direction (asc or desc). Example: <code>desc</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>asc</code></li> <li><code>desc</code></li></ul>
            </div>
                                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>sort_by</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
                <input type="text" style="display: none"
                              name="sort_by"                data-endpoint="GETapi-posts"
               value="id"
               data-component="query">
    <br>
<p>Field to sort the result by. Example: <code>id</code></p>
            </div>
                </form>

                    <h2 id="posts-endpoints-GETapi-posts--id-">GET api/posts/{id}</h2>

<p>
</p>



<span id="example-requests-GETapi-posts--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/posts/1" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/posts/1"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-posts--id-">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: {
        &quot;id&quot;: 1,
        &quot;title&quot;: &quot;Qui distinctio iure laborum aut eaque in.&quot;,
        &quot;slug&quot;: &quot;qui-distinctio-iure-laborum-aut-eaque-in&quot;,
        &quot;content&quot;: &quot;Perferendis est nihil repellendus eligendi illo. Hic consequatur quia et quo ut accusantium. Recusandae et molestiae et fuga.\n\nDolorum molestiae velit ut ipsum quae ratione. Perferendis expedita voluptatem nihil voluptas commodi ducimus est minus. Assumenda necessitatibus sunt aliquam non doloremque impedit. Et dolores a id quo similique.\n\nIn perferendis autem at harum enim. Qui natus molestiae doloremque voluptatem. Vero officia labore in quia aut atque aut.\n\nAperiam dolore eius ut reiciendis unde magni soluta. Ut molestiae adipisci est delectus non. Est consequuntur quo nulla est aperiam labore voluptates aut. Qui voluptatem et aut delectus. Perspiciatis rerum voluptatum iusto commodi perspiciatis.\n\nNecessitatibus consectetur quia est ut dolor. Autem aut voluptatem omnis inventore sunt. Laudantium mollitia doloremque voluptas quis perspiciatis iste aut.&quot;,
        &quot;short_description&quot;: &quot;Officia atque iusto omnis adipisci sunt est id totam.&quot;,
        &quot;image_url&quot;: &quot;http://localhost/storage/posts&quot;,
        &quot;status&quot;: &quot;published&quot;,
        &quot;published_at&quot;: &quot;2024-08-27T08:54:02.000000Z&quot;,
        &quot;created_at&quot;: &quot;2025-06-30T23:40:22.000000Z&quot;,
        &quot;updated_at&quot;: &quot;2025-06-30T23:40:22.000000Z&quot;,
        &quot;categories&quot;: [
            {
                &quot;id&quot;: 2,
                &quot;name&quot;: &quot;health&quot;,
                &quot;slug&quot;: &quot;health&quot;,
                &quot;created_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;,
                &quot;updated_at&quot;: &quot;2025-06-30T23:40:21.000000Z&quot;
            }
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-posts--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-posts--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-posts--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-posts--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-posts--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-posts--id-" data-method="GET"
      data-path="api/posts/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-posts--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-posts--id-"
                    onclick="tryItOut('GETapi-posts--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-posts--id-"
                    onclick="cancelTryOut('GETapi-posts--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-posts--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/posts/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-posts--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-posts--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>integer</small>&nbsp;
 &nbsp;
                <input type="number" style="display: none"
               step="any"               name="id"                data-endpoint="GETapi-posts--id-"
               value="1"
               data-component="url">
    <br>
<p>The ID of the post. Example: <code>1</code></p>
            </div>
                    </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
