var optionsCustom = {
  series: [
    {
			name: 'Earnings',
      data: [
        {
          x: "Ruth O\'Ryan",
          y: 13300
        },
        {
          x: "Tayo Olaniyi",
          y: 10000
        },
        {
          x: "Rotimi Nojeem",
          y: 11600
        },
        {
          x: "Samuel Oko",
          y: 16000
        },
        {
          x: "Titilayo Babatunde",
          y: 14300
        },
        {
          x: "Jacy Ibe",
          y: 15200
        },
        {
          x: "Danjuma Kayode",
          y: 11800
        }
      ]
    }
  ],
  chart: {
    type: "bar",
    height: 350
  },
  plotOptions: {
    bar: {
      horizontal: false,
      distributed: true
    }
  },
  dataLabels: {
    enabled: false
  },
  legend: {
    show: false
  }
};


var chartLeaderBoard = new ApexCharts(document.querySelector("#chart-profile-visit"), optionsCustom);

chartLeaderBoard.render();