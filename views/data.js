function get_data() {
    const form = document.getElementById('ankieta');
    const name = form.elements['name'].value;
    const interests = form.elements['interest'];
    const selected = [];
    for(let i=0; i<interests.length; i++) {
        if(interests[i].checked) {
            selected.push(interests[i].value);
        }
    }
    localStorage.setItem('name', name);
    localStorage.setItem('interests', JSON.stringify(selected));

    if (localStorage.getItem('name')) {
        const stored_name = localStorage.getItem('name');
        console.log('Name:', stored_name);
    } else {
        console.log('Name data is not found in local storage');
    }

    if (localStorage.getItem('interests')) {
        const stored_interests = JSON.parse(localStorage.getItem('interests'));
        console.log('Interests:', stored_interests);
    } else {
        console.log('Interests data is not found in local storage');
    }
}

function use_data() {
    const input_name = localStorage.getItem('name');
    const input_interest = JSON.parse(localStorage.getItem('interests') || '[]');
    if(input_name!=null && input_interest.includes('stars') && Array.isArray(input_interest)) {
        var ddiv = document.createElement('div');
        var link = document.createElement('a');
        link.href = 'gwiazdy.html';
        link.textContent = input_name + ', sprawdź ten artykuł o gwiazdach!';
        link.target = '_blank';
        ddiv.style.gridArea = 'header';
        ddiv.style.display = 'flex';
        ddiv.style.justifyContent = 'center';
        ddiv.style.backgroundColor = '#5e0699';
        ddiv.style.marginTop = '5px';
        ddiv.style.marginBottom = '5px';
        ddiv.style.marginInline = 'auto';
        ddiv.style.width = '30%';
        ddiv.style.height = '10%';
        ddiv.style.padding = '12px 150px';
        ddiv.style.borderRadius = '20px';
        ddiv.style.textAlign = 'center';
        ddiv.style.alignItems = 'center';
        link.style.fontSize = '15px';
        link.style.textDecoration = 'none';
        link.style.color = 'white';
        ddiv.appendChild(link);
        document.body.appendChild(ddiv);
    } else if(input_name!=null && !input_interest.includes('stars') && Array.isArray(input_interest)) {
        var dspan = document.createElement('span');
        var dtext = document.createTextNode('Niestety ' + input_name + ', jeszcze nie ma strony przeznaczonej dla Ciebie :(');
        dspan.style.gridArea = 'header';
        dspan.style.display = 'flex';
        dspan.style.justifyContent = 'center';
        dspan.style.backgroundColor = '#5e0699';
        dspan.style.marginTop = '5px';
        dspan.style.marginBottom = '5px';
        dspan.style.marginInline = 'auto';
        dspan.style.width = '40%';
        dspan.style.height = '10%';
        dspan.style.padding = '12px 150px';
        dspan.style.borderRadius = '20px';
        dspan.style.textAlign = 'center';
        dspan.style.alignItems = 'center';
        dspan.style.fontSize = '15px';
        dspan.style.color = 'white';
        dspan.appendChild(dtext);
        document.body.appendChild(dspan);
    }
}
window.addEventListener('load', use_data);