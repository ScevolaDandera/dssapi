# dssapi

API URL: https://dssapi.nodescave.com
 
FUNCTIONS

<ul>
    <li>
    <h3>/diseases</h3>
    <h4>param: none</h4>
    <p>Returns a list diseases grouped by DiseaseCode</p>
    </li>
    <li>
    <h3>/locations</h3>
    <h4>param: none</h4>
    <p>Returns a list of locations</p>
    </li>
    <li>
    <h3>/records</h3>
    <h4>param: none</h4>
    <p>Returns whole report table</p>
    </li>
    <li>
    <h3>/dstat</h3>
    <h4>param: DiseaseID</h4>
    <p>Returns report filtered by DiseaseID</p>
    </li>
    <li>
    <h3>/numberofpatients</h3>
    <h4>param: days //integer</h4>
    <p>Returns array of patients per day for last request amount of days</p>
    </li>
        <li>
    <h3>/compareyears</h3>
    <h4>param: year1</h4>
    <h4>param2: year2</h4>
    <p>Returns array of patients per month for the requested years</p>
    </li>
</ul>