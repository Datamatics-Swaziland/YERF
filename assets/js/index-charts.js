'use strict';

/* Chart.js docs: https://www.chartjs.org/ */

window.chartColors = {
    green: '#37116f',
    gray: '#a9b5c9',
    text: '#252930',
    border: '#e7e9ed'
};

// Dummy data (replace with actual data from the backend)
const dummyData = {
    businessCategories: ['Pharmacy', 'Vegetables', 'Electrical material supply', 'Clothing', 'Automotive', 'Timber sales', 'Poultry', 'Blockyard and logs', 'Hairdresser', 'Cellphone sale and repair', 'Sanitation', 'Feedlot', 'Bee keeping', 'Spares', 'Mobile money', 'Shoe repair'],
    businessCounts: [1, 4, 1, 2, 2, 2, 1, 2, 1, 1, 1, 1, 1, 1, 2, 1],
    genders: ['Male', 'Female'],
    genderDistribution: [109, 66],
    loanAmounts: ['< $10K', '$10K - $50K', '>$50K'],
    loanAmountDistribution: [30, 50, 20],
    locations: ['Location 1', 'Location 2', 'Location 3'],
    businessCoordinates: [
        { x: 10, y: 20 },
        { x: 30, y: 40 },
        { x: 50, y: 60 }
    ],
    loanTypes: ['Type 1', 'Type 2', 'Type 3'],
    loanTypeDistribution: [40, 30, 30],
    establishmentYears: ['2010', '2015', '2020'],
    establishmentDateDistribution: [20, 40, 30]
};

// Generate charts with dummy data
window.addEventListener('load', function() {
    // Business Distribution by Sector or Category
    var businessDistributionChart = document.getElementById('business-distribution-chart').getContext('2d');
    window.businessDistributionChart = new Chart(businessDistributionChart, {
        type: 'bar',
        data: {
            labels: dummyData.businessCategories,
            datasets: [{
                label: 'Number of Businesses',
                data: dummyData.businessCounts,
                backgroundColor: window.chartColors.green
            }]
        },
        options: {
            responsive: true,
            aspectRatio: 1.5,
            legend: {
                position: 'bottom',
                align: 'end',
            },
            title: {
                display: true,
                text: 'Business Distribution by Sector or Category'
            },
			scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true // Start y-axis at 0
                    }
                }]
            }
        }
    });

    // Owner Demographics
    var ownerDemographicsChart = document.getElementById('owner-demographics-chart').getContext('2d');
    window.ownerDemographicsChart = new Chart(ownerDemographicsChart, {
        type: 'pie',
        data: {
            labels: dummyData.genders,
            datasets: [{
                data: dummyData.genderDistribution,
                backgroundColor: [window.chartColors.green, window.chartColors.gray, window.chartColors.border]
            }]
        },
        options: {
            responsive: true,
            aspectRatio: 1.5,
            legend: {
                position: 'bottom',
                align: 'end',
            },
            title: {
                display: true,
                text: 'Owner Demographics'
            }
        }
    });

    // Loan Analysis
    var loanAnalysisChart = document.getElementById('loan-analysis-chart').getContext('2d');
    window.loanAnalysisChart = new Chart(loanAnalysisChart, {
        type: 'bar',
        data: {
            labels: dummyData.loanAmounts,
            datasets: [{
                label: 'Loan Amount Distribution',
                data: dummyData.loanAmountDistribution,
                backgroundColor: window.chartColors.green
            }]
        },
        options: {
            responsive: true,
            aspectRatio: 1.5,
            legend: {
                display: false
            },
            title: {
                display: true,
                text: 'Loan Analysis'
            }
        }
    });

    // Geographical Distribution of Businesses
    var geographicalDistributionChart = document.getElementById('geographical-distribution-chart').getContext('2d');
    window.geographicalDistributionChart = new Chart(geographicalDistributionChart, {
        type: 'scatter',
        data: {
            labels: dummyData.locations,
            datasets: [{
                label: 'Business Locations',
                data: dummyData.businessCoordinates,
                backgroundColor: window.chartColors.green
            }]
        },
        options: {
            responsive: true,
            aspectRatio: 1.5,
            legend: {
                display: false
            },
            title: {
                display: true,
                text: 'Geographical Distribution of Businesses'
            }
        }
    });

    // Funding Details
    var fundingDetailsChart = document.getElementById('funding-details-chart').getContext('2d');
    window.fundingDetailsChart = new Chart(fundingDetailsChart, {
        type: 'bar',
        data: {
            labels: dummyData.loanTypes,
            datasets: [{
                label: 'Loan Types',
                data: dummyData.loanTypeDistribution,
                backgroundColor: window.chartColors.green
            }]
        },
        options: {
            responsive: true,
            aspectRatio: 1.5,
            legend: {
                position: 'bottom',
                align: 'end',
            },
            title: {
                display: true,
                text: 'Funding Details'
            }
        }
    });

    // Establishment Date Analysis
    var establishmentDateChart = document.getElementById('establishment-date-chart').getContext('2d');
    window.establishmentDateChart = new Chart(establishmentDateChart, {
        type: 'bar',
        data: {
            labels: dummyData.establishmentYears,
            datasets: [{
                label: 'Establishment Dates',
                data: dummyData.establishmentDateDistribution,
                backgroundColor: window.chartColors.green
            }]
        },
        options: {
            responsive: true,
            aspectRatio: 1.5,
            legend: {
                display: false
            },
            title: {
                display: true,
                text: 'Establishment Date Analysis'
            }
        }
    });
});
