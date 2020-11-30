
const loadScript = (id, url, callback) => {
    const oldScript = document.querySelector(`script#${id}`);
    if (oldScript) oldScript.parentNode.removeChild(oldScript);

    const script = document.createElement('script');
    script.id = id;
    script.type = 'text/javascript';
  
    if (script.readyState) { // IE < 11
      script.onreadystatechange = function() {
        if (
          script.readyState === 'loaded' ||
          script.readyState === 'complete'
          ) {
            script.onreadystatechange = null;
            callback();
          }
      }
    } else { // Others
      script.onload = function () {
        callback();
      }
    }
  
    script.src = url;
    document.body.appendChild(script);
};

const removeScript = (id) => {
    const script = document.querySelector(`script#${id}`);
    if (script) script.parentNode.removeChild(script);
};

const IsValidJSONString = (str) => {
    try {
        JSON.parse(str);
    } catch (e) {
        return false;
    }
    return true;
};

const capitalize = (s) => {
  if (typeof s !== 'string') return ''
  return s.charAt(0).toUpperCase() + s.slice(1)
}