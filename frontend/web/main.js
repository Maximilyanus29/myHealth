const constuctorHtmlTags = (tagName, content, classString, id = null)=> {
    let tag = document.createElement(tagName);
    tag.innerText = content;
    if (classString){
        tag.classList.add(classString);
    }
    if (id){
        tag.id = id;
    }
    return tag;
}

const diseasTemplate = (point) => {
    let template = `
    <hr>
    <div class="disease">
        <p>Болезнь: ${point.name}</p>
        <p>дата начала: ${point.dateStart}</p>
        <p>дата конца: ${point.dateEnd}</p>
        <p>лечение: ${point.treatment}</p>
        <ul>
            <li>антибиотик 1</li>
            <li>антибиотик 2</li>
        </ul>

        <p>файлы: ${point.files}</p>
        <ul>
            <li><a href="путь к файлу">наименование файла</a></li>
            <li><a href="путь к файлу2">наименование файла2</a></li>
        </ul>
    </div>
    `;

    return template;
}

const surveyTemplate = (point) => {
    let template = `
    <hr>
    <div class="survey">
        <p>Болезнь: ${point.name}</p>
        <p>дата начала: ${point.dateStart}</p>
        <p>дата конца: ${point.dateEnd}</p>
        <p>результаты: ${point.result}</p>
        <ul>
            <li>заключение 1</li>
            <li><a href="путь к файлу">наименование файла</a></li>
        </ul>
    </div>
    `;

    return template;
}

const hiddenBlockTemplate = (point) => {
    let starts = "";
    let ends = "";


    if (point.start){
        if (point.start.diseases){
            point.start.diseases.forEach(el => {
                starts += diseasTemplate(el);
            })
        }

        if (point.start.surveys){
            point.start.surveys.forEach(el => {
                starts += surveyTemplate(el);
            })
        }
    }

    if (point.end){
        if (point.end.diseases){
            point.end.diseases.forEach(el => {
                ends += diseasTemplate(el);
            })
        }

        if (point.end.surveys){
            point.end.surveys.forEach(el => {
                ends += surveyTemplate(el);
            })
        }
    }




    let template = ``;

    if (starts){
        template += `
        <div class="start">
            <span>Начало</span>
            <div class="list">
                ${starts}
            </div>
        </div>
`;
    }

    if (ends){
        template += `
        <div class="end">
            <span>Конец</span>
            <div class="list">
                ${ends}
            </div>
        </div>
`;
    }

    return template;
}

onDocumentTouchMove = {x:0, y:0};

function onDocumentTouchMove(event) {
    onDocumentTouchMove.x = event.changedTouches[event.changedTouches.length - 1].clientX;
    onDocumentTouchMove.y = event.changedTouches[event.changedTouches.length - 1].clientY;
}

function onDocumentTouchEnd(event) {
    event.preventDefault();
    var elem = document.elementFromPoint(onDocumentTouchMove.x, onDocumentTouchMove.y);
    elem.style.background = "#ff0000";
}



/*FUNCTIONS END*/

let jsonString = '{"first_name":"\u041c\u0430\u043a\u0441\u0438\u043c","last_name":"\u0420\u044f\u0431\u0446\u0435\u0432","birthdate":"27.09.1996","chronic_diseas":{"1":{"name":"orvi","dateStart":"2024-01-01","dateEnd":"2024-01-13","treatment":["antibiotic1","antibiotic2"],"files":["path\\/to\\/file","path\\/to\\/file2"],"is_chronic":true}},"timeline":{"2024-01-01":{"start":{"diseases":[{"name":"yazva","dateStart":"2024-01-01","dateEnd":"2024-01-15","treatment":["antibiotic1","antibiotic2"],"files":["path\\/to\\/file","path\\/to\\/file2"],"is_chronic":false},{"name":"orvi","dateStart":"2024-01-01","dateEnd":"2024-01-13","treatment":["antibiotic1","antibiotic2"],"files":["path\\/to\\/file","path\\/to\\/file2"],"is_chronic":true}],"surveys":[{"name":"gastroskopia","dateStart":"2024-01-01","dateEnd":"2024-01-15","result":["antibiotic1","antibiotic2"]},{"name":"analiz krovi","dateStart":"2024-01-01","dateEnd":"2024-01-15","result":["antibiotic1","antibiotic2"]}]}},"2024-01-13":{"end":{"diseases":[{"name":"orvi","dateStart":"2024-01-01","dateEnd":"2024-01-13","treatment":["antibiotic1","antibiotic2"],"files":["path\\/to\\/file","path\\/to\\/file2"],"is_chronic":true}]}},"2024-01-15":{"end":{"diseases":[{"name":"yazva","dateStart":"2024-01-01","dateEnd":"2024-01-15","treatment":["antibiotic1","antibiotic2"],"files":["path\\/to\\/file","path\\/to\\/file2"],"is_chronic":false}],"surveys":[{"name":"gastroskopia","dateStart":"2024-01-01","dateEnd":"2024-01-15","result":["antibiotic1","antibiotic2"]},{"name":"analiz krovi","dateStart":"2024-01-01","dateEnd":"2024-01-15","result":["antibiotic1","antibiotic2"]}]}}}}';
let json = JSON.parse(jsonString);

const serverUrl = 'http://localhost:8000'
// let res = fetch(serverUrl + '/get-health-info');
let res = fetch(serverUrl + '/');
const app = document.getElementById('app');

const hiddenInfo = document.createElement('div');
hiddenInfo.classList.add('hidden-info')
app.append(hiddenInfo);











let firstKey;
let lastKey;

let timelineDiv = constuctorHtmlTags("div", "", 'timeline', 'timeline');


app.append(constuctorHtmlTags("p", json.first_name, json.first_name));
app.append(constuctorHtmlTags("p", json.last_name, json.last_name));
app.append(constuctorHtmlTags("p", json.birthdate, json.birthdate));
app.append(constuctorHtmlTags("br", ""));
app.append(constuctorHtmlTags("p", "Линия жизни:"));

app.append(timelineDiv);



const hiddenInfoBlock = document.createElement('div');
hiddenInfoBlock.style.display = 'none';
hiddenInfoBlock.id = 'hidden-info';
hiddenInfoBlock.classList.add('hidden-info');
app.append(hiddenInfoBlock);





function closeHidden(){
    hiddenInfoBlock.style.display = 'none';
}

const showHidden = (evt) => {
    closeHidden();

    const target = evt.target;

    // console.log(target)

    if (target.className !== 'timeline-point'){
        return;
    }

    hiddenInfoBlock.innerHTML = hiddenBlockTemplate(json.timeline[target.id]);

    hiddenInfoBlock.style.display = 'block';
}




let pointLength = Object.keys(json.timeline).length;
const withOnePoint = timelineDiv.offsetWidth / pointLength;

for (let key in json.timeline){
    if (!firstKey) firstKey = key;
    lastKey = key;

    let timelineDivPoint = constuctorHtmlTags("div", "", 'timeline-point');
    timelineDivPoint.id = key;
    timelineDivPoint.append(constuctorHtmlTags("div", key, 'date'));
    timelineDivPoint.addEventListener('mouseup', showHidden);
    timelineDiv.addEventListener('touchup', showHidden);


    // const hiddenInfo = document.createElement('div');
    // hiddenInfo.classList.add('hidden-info')
    // hiddenInfo.innerHTML = hiddenBlockTemplate(json.timeline[key]);

    timelineDiv.append(timelineDivPoint);
    // timelineDivPoint.append(hiddenInfo);
}



res.then(response => {
    response.json().then(json => {
        // body.append(JSON.stringify(json));



    })
});





/*
* Див разделить на несколько равных частей.
*
* получить ширину дива поделить на количество дат жсона.
*
* получим ширину 1го элемента
*
* */









