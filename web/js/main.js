if (typeof hlDocs === 'undefined') hlDocs = {};
if (typeof hlDocs.actions === 'undefined') hlDocs.actions = {
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
      var top = document.querySelector('.hl-top');
        var pan = document.getElementById('hl-pan-content');
        if (top && pan) {
            top.addEventListener('click', function () {
                pan.scrollTop = 0;
                top.style.display = 'none';
            });
        }
        var nav = document.getElementById('hl-pan-nav-menu');
        var bt = document.createElement("div");
        if (location.hostname !== 'hleb' + 2 + 'framework' + '.ru') {
            bt.id = 'hl-' + 'b' + 'eta';
            bt.innerHTML = 'Dem' + 'o con'+ 'tent on ' + location.hostname;
            nav.prepend(bt);
        }
        var th = this;
        var interval = setInterval(function () {
            if (pan.scrollTop > window.innerHeight + 200) {
                top.style.display = 'block';
            } else {
              top.style.display = 'none';
          }
      }, 1000);
        var code = document.querySelectorAll('.hl-code');
        code.forEach(function (el) {
            var cp = document.createElement("div");
            cp.classList.add('hl-copy-block');
            cp.innerHTML = '<img src="/docs/svg/copy.svg" alt="Copy to clipboard" width="28" height="15">';
            var text = el.querySelector('span');
            if (text) {
                el.insertBefore(cp, text);
                cp.addEventListener('click', function (ev) {
                    var target = ev.target;
                    var pr = target.parentNode;
                    if (pr) {
                        var sp = pr.parentNode;
                        var ct = sp.querySelector('span');
                        if (ct) {
                            var cd = document.querySelectorAll('.hl-copy-block');
                            cd.forEach(function(el) {
                                el.classList.remove('hl-copy-selected');
                            });
                            navigator.clipboard.writeText(ct.innerText.replace(/\u00A0/g, ' '));
                            pr.classList.add('hl-copy-selected');
                        }
                    }
                });
            }
        });
        let select = document.querySelector('.hl-pan-menu-version-select');
        if (select) {
            select.addEventListener('change', function() {
                if (this.value) {
                    window.location.href = this.value;
                }
            });
        }
    }
}
hlDocs.actions.register();
