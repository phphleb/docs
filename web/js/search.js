if (typeof hlDocs === 'undefined') hlDocs = {};
if (typeof hlDocs.search === 'undefined') hlDocs.search = {
    sendAjax: false,
    register: function () {
        const th = this;
        var intervalId = setInterval(function () {
            if (document.body !== null) {
                clearInterval(intervalId);
                th.stateOnload();
            }
        }, 20);
    },
    stateOnload: function () {
        var btn = document.querySelector('.hl-search-button');
        if (btn) {
            var th = this;
            btn.addEventListener('click', function(event) {
                var text = document.querySelector('.hl-search');
                var data = {};
                data.text = text.value;
                data.uri = window.location.pathname.split('/', 4);
                data.uri.shift();
                th.sendAjaxRequest(data);
            });
        }
    },
    // Получение данных для ajax
    createAjaxRequest: function () {
        if (typeof XMLHttpRequest === "undefined") {
            xhr = function () {
                try {
                    return new window.ActiveXObject("Microsoft.XMLHTTP");
                } catch (e) {
                }
            };
        } else {
            var xhr = new XMLHttpRequest();
        }
        return xhr;
    },

    sendAjaxRequest: function (data) {
        if (!this.sendAjax) {
            var url = '/search/data/';
            this.sendAjax = true;
            var th = this;
            var xhr = th.createAjaxRequest();
            if (xhr) {
                var port = window.location.port !== '' ? ':' + window.location.port : '';
                xhr.open("POST", window.location.protocol + "//" + window.location.hostname + port + url, true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                var meta = document.querySelector('meta[name="csrf-token"]');
                var params = "json_data=" + encodeURIComponent(JSON.stringify(data)) + '&_token=' + meta.getAttribute('content');
                xhr.onreadystatechange = function () {
                    if (this.readyState != 4) return;
                    th.sendAjax = false;
                    if (this.status == 200) {
                        console.log('Data send.');
                        th.afterRequest(this.responseText);
                    } else {
                        console.log('Data not send.');
                    }
                    delete xhr;
                }
                xhr.upload.onerror = function() {
                    alert('[' + xhr.status + '] No Internet/API connection :( ');
                    hlogin.panel.sendingData = false;
                };
                /* console.log(params); */
                xhr.send(params);
            }
        }
    },
    afterRequest: function(data) {
        var block = document.querySelector('.hl-search-result');
        block .innerHTML = '';
        if (data) {
            var ar = JSON.parse(data);
            if (ar['result'] === 'ok') {
                delete ar['result'];
                ar = ar['data'];
                for (var url in ar) {
                    var el = ar[url];
                    for (var title in el) {
                        var anchor = '#section-' + el[title][0];
                        var str = el[title][1];
                        var row = '<h3 class="hl-search-title"><a href="' + url + anchor + '">' + title + '</a><br><div class="hl-search-text">' + str + '</div>';
                        block.innerHTML += row + '<br>';
                    }
                }
            } else {
                block.innerHTML = '<p class="hl-search-error">' + ar['message'] + '</p>';
            }
        }
    },
}
hlDocs.search.register();