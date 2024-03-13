'use strict';

/* Chart.js docs: https://www.chartjs.org/ */

window.chartColors = {
    green: '#37116f', // rgba(117,193,129, 1)
    blue: '#5b99ea', // rgba(91,153,234, 1)
    gray: '#a9b5c9',
    text: '#252930',
    border: '#e7e9ed'
};

// Dummy data for demo purpose
const businessEstablishmentDates = [
    { date: '2019-06-01', name: 'The Garden Pharmacy' },
    { date: '2020-02-01', name: 'Jimba investment' },
    { date: '2021-01-01', name: 'Ndida Fresh Producer' },
    { date: '2019-03-28', name: 'Thabekhulu Investments' },
    { date: '2018-10-01', name: "Taker's Investments trading as automotive professional" },
    { date: '2019-10-01', name: 'Proud Lobhoncela Investments' },
    { date: '2019-10-01', name: 'Proud Lobhoncela Investments' },
    { date: '2016-06-01', name: 'Iyaziphandela poultry' },
    { date: '2020-10-01', name: 'Lobby Investment' },
    { date: '2020-10-01', name: 'Lobby Investment' },
    { date: '2012-01-03', name: 'Archace farm produce' },
    { date: '2020-03-01', name: 'Secrete Academy Salon' },
    { date: '2018-10-06', name: 'Highpurpose investment pty ltd' },
    { date: '2014-01-31', name: 'X-leaders investment' },
    { date: '2007-06-01', name: 'Tebenguni peddlers' },
    { date: '2019-01-01', name: 'Sphasha (Pty) Ltd' },
    { date: '2016-08-01', name: 'FRESHPROVEG' },
    { date: '2018-02-01', name: 'Setsembiso trading  agric and poultry suppliers.' },
    { date: '2019-06-01', name: 'Forward ever beekeeping' },
    { date: '2015-01-01', name: 'Sinenjongo Investment  (Pty) Ltd' },
    { date: '2013-01-01', name: 'Information center' },
    { date: '2022-01-01', name: 'KwaMwelase Multi serve(pty)Ltd' },
    { date: '2019-01-01', name: 'Mepsa investment' },
    { date: '2011-06-01', name: 'Mgcini Sicelo Mdlovu siyakhula sonkhe fruits and veg farrming' },
    { date: '2018-01-01', name: 'Global Soretaste' },
    { date: '2017-02-01', name: 'Ematungwa Poultry Farm' },
    { date: '2021-01-01', name: 'Longogo investments' },
    { date: '2013-12-02', name: 'Ngempela piggery project' },
    { date: '2020-09-01', name: 'La Lucia Car wash' },
    { date: '2019-12-21', name: 'Luko ND investment (Pty) Ltd' },
    { date: '2015-01-31', name: 'Nonombela Agri Produce' },
    { date: '2021-06-01', name: 'Tinashe investment pty' },
    { date: '2019-01-01', name: 'Velekhe projects' },
    { date: '2014-09-01', name: 'Topside investment' },
    { date: '2014-09-01', name: 'Topside investment' },
    { date: '2020-01-01', name: 'Pasty and fresh chicken' },
    { date: '2020-10-01', name: 'Landris piggery' },
    { date: '2015-01-01', name: 'Mahlaba Video Production' },
    { date: '2016-08-01', name: 'Khudreams piggery' },
    { date: '2019-01-01', name: 'Ndumiso Piggery' },
    { date: '2016-12-01', name: 'Gp\'s poultry farm' },
    { date: '2019-03-01', name: 'Machinga Farms' },
    { date: '2017-01-01', name: 'Siyabulela Investments' },
    { date: '2021-11-01', name: 'Mantutsini car wash' },
    { date: '2019-06-01', name: 'Escapades makhaya chicken' },
    { date: '2020-10-02', name: 'Intelect group' },
    { date: '2017-09-21', name: 'Multipurpose Society United' },
    { date: '2019-01-05', name: 'Brand Master' },
    { date: '2019-03-01', name: 'Notsile Piggery' },
    { date: '2019-01-01', name: 'Mangena Farm' },
    { date: '2018-06-01', name: 'Focus Flats' },
    { date: '2019-10-01', name: 'Sifisosam grocery' },
    { date: '2015-02-01', name: 'Line Media services' },
    { date: '2017-12-01', name: 'Ngudzeni mobile' },
    { date: '2019-07-01', name: 'Asidleni Eggs Production' },
    { date: '2017-01-01', name: 'Akubenjalo  Investments trading as computek' },
    { date: '2021-05-01', name: 'Inathi Farm' },
    { date: '2018-01-01', name: 'Zees restaurant' },
    { date: '2018-11-01', name: 'JJ Poultry' },
    { date: '2020-07-01', name: 'MYLOE\'s piggery' },
    { date: '2017-01-04', name: 'Curb masters' },
    { date: '2021-12-15', name: 'Siyakhula business farming' },
    { date: '2020-02-14', name: 'Skaftin mobile kitchen' },
    { date: '2019-08-01', name: 'Gardenville' },
    { date: '2019-01-01', name: 'Thatha uthuthuke grocery' },
    { date: '2015-07-01', name: 'Zamokwakhe Grocery' },
    { date: '2017-01-01', name: 'Equick investments' },
    { date: '2020-01-01', name: 'Growbiz Fruits and Veg' },
    { date: '2019-12-01', name: 'Fresh produce 360' },
    { date: '2017-01-02', name: 'Tibusiso Tami Piggery' },
    { date: '2016-01-01', name: 'S H Authentics' },
    { date: '2014-01-01', name: 'Mbhele and sons' },
    { date: '2019-12-01', name: 'Rannah Investment' },
    { date: '2019-01-01', name: 'Vavi Mobile' },
    { date: '2020-01-05', name: 'Emantolo Family Farms' },
    { date: '2019-12-01', name: 'PC Farm Produce' },
    { date: '2020-01-01', name: 'Early birds mobile car wash' },
    { date: '2020-04-01', name: 'Babazile\'s piggery' },
    { date: '2019-02-01', name: 'Btros cleaners' },
    { date: '2018-08-01', name: 'Nkazimulo Sihlongonyane Piggery' },
    { date: '2020-01-02', name: 'Imphumelelo yeMphini Farm' },
    { date: '2019-02-01', name: 'Collin\'s Feedlot' },
    { date: '2018-01-01', name: 'Ada and Lwa Mobile money' },
    { date: '2018-03-01', name: 'The grace driving school' },
    { date: '2020-01-01', name: 'LND Empire Investment' },
    { date: '2020-01-01', name: 'LND Empire Investment' },
    { date: '2020-01-01', name: 'LND Empire Investment' },
    { date: '2018-06-01', name: 'Mpendu\'s Bakery' },
    { date: '2017-01-01', name: 'Gift Piggery Business' },
    { date: '2021-03-01', name: 'Benalicefoods' },
    { date: '2020-01-01', name: 'Forward ever PC dress making' },
    { date: '2015-01-03', name: 'Elshadai Hairdressing Salon' },
    { date: '2021-03-02', name: 'KaMsandi General dealer' },
    { date: '2018-01-01', name: 'Swazi go organic investments' },
    { date: '2020-01-01', name: 'Shall recover mobile money' },
    { date: '2020-12-01', name: 'Sibuyane Piggery farms' },
    { date: '2019-01-02', name: 'Litsemba lemakholo Investments' },
    { date: '2021-08-02', name: 'Arc-Angel investment' },
    { date: '2017-09-01', name: 'AFridge masters and electrical' },
    { date: '2010-01-03', name: 'Mongi  B Photography' },
    { date: '2021-10-26', name: 'Agri-life farms pty ltd' },
    { date: '2019-06-01', name: 'Sijingisile Piggery' },
    { date: '2019-01-01', name: 'Mbeva Piggery' },
    { date: '2017-01-01', name: 'Hydropce' },
    { date: '2018-05-01', name: 'Ohio Investment' },
    { date: '2021-06-01', name: 'Inala Yemaswati agricultural supplies' },
    { date: '2019-01-01', name: 'Health Scene' },
    { date: '2018-04-01', name: 'Exella in abundance' },
    { date: '2021-08-01', name: 'Nosisa piggery project' },
    { date: '2020-12-15', name: 'S J S (Pty) Ltd' },
    { date: '2018-01-01', name: 'LWT piggery' },
    { date: '2021-06-01', name: 'SMD animal production' },
    { date: '2019-01-01', name: 'Sibuko Farm Project' },
    { date: '2018-03-01', name: 'Fufus Fresh Vegetables' },
    { date: '2022-01-26', name: 'Egagasini mobile money' },
    { date: '2020-02-01', name: 'Down to earth fresh produce' },
    { date: '2020-10-31', name: 'Siyaphambili piggery' },
    { date: '2020-02-01', name: 'Musmurizedfoods' },
    { date: '2019-02-03', name: 'SJ Unlimited investment' },
    { date: '2019-02-01', name: 'Nothando Broiler Project' },
    { date: '2020-06-01', name: 'Mshadza Investments' },
    { date: '2018-08-01', name: 'BuhleBemacusi production' },
    { date: '2019-06-28', name: 'GkSD investment' },
    { date: '2018-01-04', name: 'Tsine bantfu investment' },
    { date: '2020-11-01', name: 'Alta Vista (AA) Investments' },
    { date: '2013-06-01', name: 'Merlinfarms' },
    { date: '2018-01-01', name: 'Nkosiyinhle Mobile' },
    { date: '2018-01-31', name: 'Nothando\'s kitchen' },
    { date: '2016-02-01', name: 'Mthunzi Myeni' },
    { date: '2019-06-01', name: 'Spice continent' },
    { date: '2019-01-31', name: 'Velo\'s catering' },
    { date: '2020-01-01', name: 'Ngidi Poultry Farm' },
    { date: '2019-01-01', name: 'Lazy cat creations' },
    { date: '2020-10-02', name: 'Gcinile Piggery' },
    { date: '2020-06-01', name: 'Besutfu' },
    { date: '2020-10-01', name: 'N A M Group' },
    { date: '2019-11-01', name: 'Agri- Ms' },
    { date: '2019-11-01', name: 'Machawe Quick Services' },
    { date: '2020-04-01', name: 'M&G Mobile Money' },
    { date: '2018-01-01', name: 'Tempt Mobile Services' },
    { date: '2020-11-01', name: 'Nomfundo\'s piggery' },
    { date: '2019-01-01', name: 'Worthwhile dressmaking' },
    { date: '2019-11-01', name: 'The Legacy furnitures' },
    { date: '2019-08-01', name: 'Dinani free range turkey and poultry' },
    { date: '2019-01-02', name: 'Subdue piggery' },
    { date: '2018-09-30', name: 'Mr Ten Mobile Money' },
    { date: '2017-09-13', name: 'Muthalule Farm' },
    { date: '2019-06-01', name: 'Siyatfutfuka enterprise' },
    { date: '2019-01-01', name: 'Phumlani Innovation Farm' },
    { date: '2018-01-01', name: 'Eyethu Production' },
    { date: '2016-01-01', name: 'Sunrise pub and grill' },
    { date: '2015-03-01', name: 'Nzalabantu\'s Creations' },
    { date: '2019-06-01', name: 'Mmbathi Piggery' },
    { date: '2020-01-01', name: 'Ntobeko Taxi' },
    { date: '2020-01-01', name: 'Godheaven Chicken' },
    { date: '2020-02-01', name: 'Mnukwa' },
    { date: '2019-01-01', name: 'Ntsika Agri and poultry' },
    { date: '2019-10-01', name: 'Mputhi piggery and poultry' },
    { date: '2018-01-01', name: 'Intanda inkosana chicken' },
    { date: '2020-07-01', name: 'Bongosikhona piggery' },
    { date: '2020-06-01', name: 'Kwande production' },
    { date: '2020-11-01', name: 'Javiebees agency' },
    { date: '2018-01-01', name: 'Alamaveggies' },
    { date: '2020-01-01', name: 'Isimanga enterprise' },
    { date: '2017-01-01', name: 'Masizame Youth Development' },
    { date: '2018-06-01', name: 'Geboto Piggery Farming' },
    { date: '2018-08-01', name: 'Injili Agri Business' },
    { date: '2018-01-01', name: 'Ursula Trading' },
    { date: '2019-01-01', name: 'Siyakhula Projects' },
    { date: '2019-02-01', name: 'Itshokolelitsha general dealers' },
    { date: '2019-08-01', name: 'S and Y piggery' },
    { date: '2018-11-01', name: 'Ubuthebe trading pty ltd' },
    { date: '2020-09-01', name: 'Busiqo hardware and milling' },
    { date: '2021-05-01', name: 'Magcebelele chicken production' },
    { date: '2020-06-01', name: 'Thulamntwana chicken production' },
    { date: '2020-01-01', name: 'Nomvula food and beverages' },
    { date: '2018-02-01', name: 'House of feed poultry' },
    { date: '2020-09-01', name: 'NtuthukoLwazi trading pty' },
    { date: '2019-01-01', name: 'Ikamvayouth development' },
    { date: '2018-01-01', name: 'Mangaliso bakery' },
    { date: '2020-01-01', name: 'Sinabo chicken' },
    { date: '2021-04-01', name: 'Nozipho\'s Piggery' },
    { date: '2017-08-01', name: 'Ezimali Butchery' },
    { date: '2019-08-01', name: 'Kwadala primary cooperative' },
    { date: '2020-11-01', name: 'KuGcotshane Construction' },
    { date: '2019-01-01', name: 'Bayethe poultry project' },
    { date: '2021-01-01', name: 'Sikhuluma beehive farming' },
    { date: '2020-10-01', name: 'Makhathini catering' },
    { date: '2020-10-01', name: 'Youth Agri enterprise' },
    { date: '2018-01-01', name: 'Cliffhouse media' },
    { date: '2020-03-01', name: 'Tirani Agri-business' },
    { date: '2019-01-01', name: 'Vutha recycling' },
    { date: '2021-09-01', name: '2M Farms' },
    { date: '2019-01-01', name: 'Dr Joe clinics' },
    { date: '2019-11-01', name: 'Sawamasobala poultry project' },
    { date: '2019-08-01', name: 'Mandonsi security company' },
    { date: '2021-03-01', name: 'Imvelo yama-Afrika chicken production' },
    { date: '2019-01-01', name: 'Agri-processing solutions' },
    { date: '2021-04-01', name: 'Mantshinga poultry and livestock' },
    { date: '2019-03-01', name: 'Mahlale\'s kitchen' },
    { date: '2020-01-01', name: 'Thehe events management' },
    { date: '2019-06-01', name: 'Philani kwezi piggery' },
    { date: '2020-12-01', name: 'Intshebe tshumayelo' },
    { date: '2020-11-01', name: 'Mwathani aquaculture farm' },
    { date: '2019-01-01', name: 'Shewula Bakery' },
    { date: '2020-01-01', name: 'Sick line clinic' },
    { date: '2019-01-01', name: 'Dlalisa ithemba burial society' },
    { date: '2019-01-01', name: 'Kunene enterprise' },
    { date: '2019-01-01', name: 'Mshengu projects' },
    { date: '2019-02-01', name: 'Phila uzwelo project' },
    { date: '2020-01-01', name: 'Thuma mina caterers' },
    { date: '2019-01-01', name: 'Mbizana fresh produce market' },
    { date: '2020-01-01', name: 'Vili farm produce' },
    { date: '2019-01-01', name: 'Rise and shine poultry project' },
    { date: '2021-05-01', name: 'Ngcobo dairy farm' },
    { date: '2021-01-01', name: 'Okukhanya distribution' },
    { date: '2019-01-01', name: 'Xolani enterprise' },
    { date: '2019-02-01', name: 'MaDlamini burial society' },
    { date: '2019-01-01', name: 'Sasol spoils' },
    { date: '2019-01-01', name: 'Programeye' },
    { date: '2021-05-01', name: 'Boxbird piggery' },
    { date: '2019-01-01', name: 'Vegetable house' },
    { date: '2021-06-01', name: 'Kwanele tyre repair' },
    { date: '2020-01-01', name: 'Zwirhirwi trading' },
    { date: '2019-01-01', name: 'Manini holding' },
    { date: '2020-01-01', name: 'Big tree logistics' },
];
   


const categoryNames = ['Pharmacy', 'Vegetables', 'Electrical material supply', 'Clothing', 'Automotive', 'Timber sales', 'Poultry', 'Blockyard and logs', 'Hairdresser', 'Cellphone sale and repair', 'Sanitation', 'Feedlot', 'Bee keeping', 'Spares', 'Mobile money', 'Shoe repair'];

// Function to generate a random number between min and max, inclusive of both
function getRandomNumber(min, max) {
  return Math.floor(Math.random() * (max - min + 1)) + min;
}

// Generating random funding amounts for each category
const fundingAmounts = categoryNames.map(() => getRandomNumber(50000, 100000));

// Generating random outstanding balances for each category
const outstandingBalances = categoryNames.map(() => getRandomNumber(10000, 50000));

console.log("Random Funding Amounts:", fundingAmounts);
console.log("Random Outstanding Balances:", outstandingBalances);


// Function to generate random data for demo purpose
const randomDataPoint = () => Math.round(Math.random() * 100);

// Aggregate data for each year
const aggregatedData = {};
businessEstablishmentDates.forEach(date => {
    const year = new Date(date.date).getFullYear().toString();
    if (!aggregatedData[year]) {
        aggregatedData[year] = [];
    }
    aggregatedData[year].push(date.name);
});

// Prepare data points for the line chart
const lineChartDataPoints = Object.keys(aggregatedData).map(year => ({
    x: year,
    y: aggregatedData[year].length,
    businesses: aggregatedData[year]
}));

// Area Line Chart Demo
const lineChartConfig = {
    type: 'line',
    data: {
        labels: Object.keys(aggregatedData),
        datasets: [{
            label: 'Business Count',
            backgroundColor: "rgba(55,17,111,0.2)", 
            borderColor: "rgba(55,17,111,1)", 
            data: lineChartDataPoints
        }]
    },
    options: {
        responsive: true,
        legend: {
            display: true,
            position: 'bottom',
            align: 'end',
        },
        tooltips: {
            callbacks: {
                label: function(tooltipItem, data) {
                    const year = tooltipItem.label;
                    const businesses = lineChartDataPoints.find(point => point.x === year).businesses.join(', ');
                    return `Year: ${year}\nBusinesses: ${businesses}`;
                }
            }
        },
        scales: {
            x: {
                title: {
                    display: true,
                    text: 'Year'
                }
            },
            y: {
                title: {
                    display: true,
                    text: 'Number of Businesses Established'
                }
            }
        }
    }
};




// Bar Chart Demo
const barChartConfig = {
    type: 'bar',
    data: {
        labels: categoryNames,
        datasets: [{
            label: 'Funding Amount',
            backgroundColor: "rgba(55,17,111,0.8)", 
            hoverBackgroundColor: "rgba(55,17,111,1)",
            data: fundingAmounts
        },
        {
            label: 'Outstanding Balance',
            backgroundColor: "rgba(142, 48, 82, 1)", 
            hoverBackgroundColor: "rgba(142, 48, 82, 1)",
            data: outstandingBalances
        }]
    },
    options: {
        responsive: true,
        legend: {
            position: 'bottom',
            align: 'end',
        },
    }
};

// Pie Chart Demo
const pieChartConfig = {
    type: 'pie',
    data: {
        datasets: [{
            data: [
                randomDataPoint(),
                randomDataPoint(),
                randomDataPoint(),
            ],
            backgroundColor: [
                window.chartColors.green,
                window.chartColors.blue,
                window.chartColors.gray,

            ],
            label: 'Dataset 1'
        }],
        labels: [
            'Green',
            'Blue',
            'Gray',
        ]
    },
    options: {
        responsive: true,
        legend: {
            display: true,
            position: 'bottom',
            align: 'center',
        },
    }
};

// Doughnut Chart Demo
const doughnutChartConfig = {
    type: 'doughnut',
    data: {
        datasets: [{
            data: [
                randomDataPoint(),
                randomDataPoint(),
                randomDataPoint(),
            ],
            backgroundColor: [
                window.chartColors.green,
                window.chartColors.blue,
                window.chartColors.gray,

            ],
            label: 'Dataset 1'
        }],
        labels: [
            'Green',
            'Blue',
            'Gray',
        ]
    },
    options: {
        responsive: true,
        legend: {
            display: true,
            position: 'bottom',
            align: 'center',
        },
    }
};

// Generate charts on load
window.addEventListener('load', function(){
    const lineChart = document.getElementById('chart-line').getContext('2d');
    window.myLine = new Chart(lineChart, lineChartConfig);
    
    const barChart = document.getElementById('chart-bar').getContext('2d');
    window.myBar = new Chart(barChart, barChartConfig);
    
    const pieChart = document.getElementById('chart-pie').getContext('2d');
    window.myPie = new Chart(pieChart, pieChartConfig);
    
    const doughnutChart = document.getElementById('chart-doughnut').getContext('2d');
    window.myDoughnut = new Chart(doughnutChart, doughnutChartConfig);
});
