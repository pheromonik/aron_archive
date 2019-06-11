<?php include('mapConnect.php') ?>

<script>
  const rotStepAngle = Math.PI / 1200;
  const galWidth = 920;
  const galHeight = 720;
  const galDepth = 720;
  const observerPos = {x:"500", y:"-1000", z:"400"};
  const mapCenter = {x:"500", y:"400", z:"400"};
  const flightFactor = 20.0;
  const updateTick = 25;

  const stars = <?php echo json_encode($stars) ?>;
//   const stars = [
//   	{id:"1", name:"Aethale", x:"692", y:"92", z:"260", fraction:"Hornets", color:"white", size:"5"},
//   	{id:"2", name:"Bellicosa", x:"700", y:"128", z:"96", fraction:"Hornets", color:"red", size:"6"},
//   	{id:"3", name:"Daedalea", x:"564", y:"56", z:"62", fraction:"Hornets", color:"blue", size:"4"},
//   	{id:"4", name:"Fumida", x:"510", y:"84", z:"382", fraction:"Hornets", color:"yellow", size:"5"},
//   	{id:"5", name:"Longicornis", x:"106", y:"632", z:"478", fraction:"Hornets", color:"white", size:"6"},
//   	{id:"6", name:"Sphaerogaster", x:"230", y:"632", z:"204", fraction:"Hornets", color:"red", size:"4"},
//   	{id:"7", name:"Tenebricosa", x:"786", y:"522", z:"70", fraction:"Hornets", color:"blue", size:"5"},
//   	{id:"8", name:"Patria", x:"226", y:"330", z:"532", fraction:"Prussianer", color:"yellow", size:"6"},
//   	{id:"9", name:"Siegfried", x:"298", y:"218", z:"612", fraction:"Prussianer", color:"white", size:"4"},
//   	{id:"10", name:"Loreley", x:"272", y:"310", z:"496", fraction:"Prussianer", color:"red", size:"5"},
//   	{id:"11", name:"M'Sebuwa", x:"196", y:"240", z:"246", fraction:"Prussianer", color:"blue", size:"6"},
//   	{id:"12", name:"Xindao", x:"572", y:"44", z:"554", fraction:"Prussianer", color:"yellow", size:"4"},
//   	{id:"13", name:"Viktoria", x:"418", y:"328", z:"204", fraction:"Prussianer", color:"white", size:"5"},
//   	{id:"14", name:"Sol", x:"208", y:"208", z:"364", fraction:"VfV", color:"red", size:"6"},
//   	{id:"15", name:"Zarkol", x:"262", y:"106", z:"208", fraction:"VfV", color:"blue", size:"4"},
//   	{id:"16", name:"Wegron", x:"220", y:"412", z:"362", fraction:"VfV", color:"yellow", size:"5"},
//   	{id:"17", name:"Reso", x:"202", y:"300", z:"262", fraction:"VfV", color:"white", size:"6"},
//   	{id:"18", name:"Yjo", x:"212", y:"314", z:"260", fraction:"VfV", color:"red", size:"4"},
//   	{id:"19", name:"Blythe", x:"220", y:"180", z:"540", fraction:"VfV", color:"blue", size:"5"},
//   	{id:"20", name:"Sol Cator", x:"290", y:"302", z:"288", fraction:"Catores", color:"yellow", size:"6"},
//   	{id:"21", name:"Dentaris", x:"514", y:"328", z:"204", fraction:"Catores", color:"white", size:"4"},
//   	{id:"22", name:"Vyrja", x:"450", y:"344", z:"364", fraction:"Neutral", color:"red", size:"5"},
//   	{id:"23", name:"Heremus", x:"462", y:"414", z:"192", fraction:"Neutral", color:"blue", size:"6"},
//   	{id:"24", name:"Zerenosa", x:"702", y:"532", z:"648", fraction:"Kontarraner", color:"yellow", size:"4"},
//   	{id:"25", name:"Rej'darak", x:"668", y:"612", z:"354", fraction:"Kontarraner", color:"white", size:"5"},
//   	{id:"26", name:"Ahunac", x:"756", y:"386", z:"196", fraction:"Kontarraner", color:"red", size:"6"},
//   	{id:"27", name:"Kontarr Prime", x:"684", y:"510", z:"434", fraction:"Kontarraner", color:"blue", size:"4"},
//   	{id:"28", name:"Jan'darak", x:"642", y:"188", z:"504", fraction:"Kontarraner", color:"yellow", size:"5"},
//   	{id:"29", name:"Trosia", x:"404", y:"330", z:"186", fraction:"Neutral", color:"white", size:"6"},
//   	{id:"30", name:"Lendera", x:"426", y:"344", z:"200", fraction:"Neutral", color:"red", size:"4"},
//   	{id:"31", name:"Raganzia", x:"478", y:"224", z:"104", fraction:"Neutral", color:"blue", size:"5"},
//   	{id:"32", name:"Centros", x:"178", y:"220", z:"64", fraction:"Neutral", color:"yellow", size:"6"},
//   	{id:"33", name:"Lusall'Ur", x:"166", y:"2", z:"406", fraction:"Neutral", color:"white", size:"4"},
//   	{id:"34", name:"D'kett", x:"178", y:"24", z:"416", fraction:"Neutral", color:"red", size:"5"},
//   	{id:"35", name:"Verbol", x:"300", y:"40", z:"78", fraction:"Neutral", color:"blue", size:"6"},
//   	{id:"36", name:"Tal", x:"318", y:"46", z:"112", fraction:"Neutral", color:"yellow", size:"4"},
//   	{id:"37", name:"Discovery", x:"144", y:"386", z:"90", fraction:"Neutral", color:"white", size:"5"},
//   	{id:"38", name:"Gersellis", x:"456", y:"364", z:"360", fraction:"Neutral", color:"red", size:"6"},
//   	{id:"39", name:"Tia", x:"706", y:"420", z:"162", fraction:"Neutral", color:"blue", size:"4"},
//   	{id:"40", name:"Kastellum", x:"178", y:"362", z:"84", fraction:"Neutral", color:"yellow", size:"5"},
//   	{id:"41", name:"Meridin", x:"164", y:"356", z:"70", fraction:"Neutral", color:"white", size:"6"},
//   	{id:"42", name:"Affinis", x:"164", y:"254", z:"644", fraction:"Neutral", color:"red", size:"4"},
//   	{id:"43", name:"Rhakan", x:"328", y:"306", z:"362", fraction:"Neutral", color:"blue", size:"5"},
//   	{id:"44", name:"Vak", x:"158", y:"386", z:"58", fraction:"Neutral", color:"yellow", size:"6"}
//   ];

  const starsOrigin = [
      {id:"1", name:"Aethale", x:"692", y:"92", z:"260", fraction:"Hornets", color:"white", size:"5"},
      {id:"2", name:"Bellicosa", x:"700", y:"128", z:"96", fraction:"Hornets", color:"red", size:"6"},
      {id:"3", name:"Daedalea", x:"564", y:"56", z:"62", fraction:"Hornets", color:"blue", size:"4"},
      {id:"4", name:"Fumida", x:"510", y:"84", z:"382", fraction:"Hornets", color:"yellow", size:"5"},
      {id:"5", name:"Longicornis", x:"106", y:"632", z:"478", fraction:"Hornets", color:"white", size:"6"},
      {id:"6", name:"Sphaerogaster", x:"230", y:"632", z:"204", fraction:"Hornets", color:"red", size:"4"},
      {id:"7", name:"Tenebricosa", x:"786", y:"522", z:"70", fraction:"Hornets", color:"blue", size:"5"},
      {id:"8", name:"Patria", x:"226", y:"330", z:"532", fraction:"Prussianer", color:"yellow", size:"6"},
      {id:"9", name:"Siegfried", x:"298", y:"218", z:"612", fraction:"Prussianer", color:"white", size:"4"},
      {id:"10", name:"Loreley", x:"272", y:"310", z:"496", fraction:"Prussianer", color:"red", size:"5"},
      {id:"11", name:"M'Sebuwa", x:"196", y:"240", z:"246", fraction:"Prussianer", color:"blue", size:"6"},
      {id:"12", name:"Xindao", x:"572", y:"44", z:"554", fraction:"Prussianer", color:"yellow", size:"4"},
      {id:"13", name:"Viktoria", x:"418", y:"328", z:"204", fraction:"Prussianer", color:"white", size:"5"},
      {id:"14", name:"Sol", x:"208", y:"208", z:"364", fraction:"VfV", color:"red", size:"6"},
      {id:"15", name:"Zarkol", x:"262", y:"106", z:"208", fraction:"VfV", color:"blue", size:"4"},
      {id:"16", name:"Wegron", x:"220", y:"412", z:"362", fraction:"VfV", color:"yellow", size:"5"},
      {id:"17", name:"Reso", x:"202", y:"300", z:"262", fraction:"VfV", color:"white", size:"6"},
      {id:"18", name:"Yjo", x:"212", y:"314", z:"260", fraction:"VfV", color:"red", size:"4"},
      {id:"19", name:"Blythe", x:"220", y:"180", z:"540", fraction:"VfV", color:"blue", size:"5"},
      {id:"20", name:"Sol Cator", x:"290", y:"302", z:"288", fraction:"Catores", color:"yellow", size:"6"},
      {id:"21", name:"Dentaris", x:"514", y:"328", z:"204", fraction:"Catores", color:"white", size:"4"},
      {id:"22", name:"Vyrja", x:"450", y:"344", z:"364", fraction:"Neutral", color:"red", size:"5"},
      {id:"23", name:"Heremus", x:"462", y:"414", z:"192", fraction:"Neutral", color:"blue", size:"6"},
      {id:"24", name:"Zerenosa", x:"702", y:"532", z:"648", fraction:"Kontarraner", color:"yellow", size:"4"},
      {id:"25", name:"Rej'darak", x:"668", y:"612", z:"354", fraction:"Kontarraner", color:"white", size:"5"},
      {id:"26", name:"Ahunac", x:"756", y:"386", z:"196", fraction:"Kontarraner", color:"red", size:"6"},
      {id:"27", name:"Kontarr Prime", x:"684", y:"510", z:"434", fraction:"Kontarraner", color:"blue", size:"4"},
      {id:"28", name:"Jan'darak", x:"642", y:"188", z:"504", fraction:"Kontarraner", color:"yellow", size:"5"},
      {id:"29", name:"Trosia", x:"404", y:"330", z:"186", fraction:"Neutral", color:"white", size:"6"},
      {id:"30", name:"Lendera", x:"426", y:"344", z:"200", fraction:"Neutral", color:"red", size:"4"},
      {id:"31", name:"Raganzia", x:"478", y:"224", z:"104", fraction:"Neutral", color:"blue", size:"5"},
      {id:"32", name:"Centros", x:"178", y:"220", z:"64", fraction:"Neutral", color:"yellow", size:"6"},
      {id:"33", name:"Lusall'Ur", x:"166", y:"2", z:"406", fraction:"Neutral", color:"white", size:"4"},
      {id:"34", name:"D'kett", x:"178", y:"24", z:"416", fraction:"Neutral", color:"red", size:"5"},
      {id:"35", name:"Verbol", x:"300", y:"40", z:"78", fraction:"Neutral", color:"blue", size:"6"},
      {id:"36", name:"Tal", x:"318", y:"46", z:"112", fraction:"Neutral", color:"yellow", size:"4"},
      {id:"37", name:"Discovery", x:"144", y:"386", z:"90", fraction:"Neutral", color:"white", size:"5"},
      {id:"38", name:"Gersellis", x:"456", y:"364", z:"360", fraction:"Neutral", color:"red", size:"6"},
      {id:"39", name:"Tia", x:"706", y:"420", z:"162", fraction:"Neutral", color:"blue", size:"4"},
      {id:"40", name:"Kastellum", x:"178", y:"362", z:"84", fraction:"Neutral", color:"yellow", size:"5"},
      {id:"41", name:"Meridin", x:"164", y:"356", z:"70", fraction:"Neutral", color:"white", size:"6"},
      {id:"42", name:"Affinis", x:"164", y:"254", z:"644", fraction:"Neutral", color:"red", size:"4"},
      {id:"43", name:"Rhakan", x:"328", y:"306", z:"362", fraction:"Neutral", color:"blue", size:"5"},
      {id:"44", name:"Vak", x:"158", y:"386", z:"58", fraction:"Neutral", color:"yellow", size:"6"}
  ];

  var c = document.getElementById("starMap");
  var ctx = c.getContext("2d");
  var rotTimer;
  var flyTimer;
  var updateFlightTimer;
  var flightWatch;
  var colorSwitch;
  var startPosition = 38;
  var targetPosition = 0;
  var currentPlanet = 0;

  var isFlying = false;
  var isRotating = false;

  c.addEventListener("click", function(event)
  {
      var xVal = event.pageX - c.offsetLeft;
      var zVal = event.pageY - c.offsetTop;
      var planetClicked = getPlanetByCoords(xVal, zVal, stars);
      if (colorSwitch === "self")
      {
          if(isFlying === true)
          {
              alert("Du bist gerade im Flug!");
          }
          else
          {
              targetPosition = planetClicked;
              redrawMap(stars, currentPlanet, targetPosition)
          }
      }
  });

  function initMap()
  {
  	ctx.fillRect(0, 0, galWidth, galHeight);
  	colorSwitch = "normal";
  	currentPlanet = startPosition;
  	sortStars(stars);
  	drawStars(stars);
  	document.getElementById("screenImg").src = "img/part" + currentPlanet + ".png";
  }

  function redrawMap(starArray, id1, id2)
  {
      ctx.beginPath();
      ctx.fillStyle = "black";
      ctx.fillRect(0, 0, galWidth, galHeight);
      sortStars(starArray);
      drawStars(starArray, colorSwitch);
      
      document.getElementById("screenImg").src = "img/part" + id1 + ".png";
      document.getElementById("targetPreview").src = "img/planet" + id2 + ".png";
  }

  function drawStars(starArray)
  {
      starArray.forEach(function(element)
      {
          var distanceFactor = distance(mapCenter, observerPos) / distance(element, observerPos); 
          ctx.beginPath();
          ctx.arc(element.x, element.z, element.size * distanceFactor, 0, 2 * Math.PI);
          
          if (colorSwitch === "fraction")
          {
              ctx.fillStyle = fractionColor(element.fraction);
          }
          else if (colorSwitch === "self")
          {
              if (element.id == startPosition)
              {
                  ctx.fillStyle = "green";
              }
              else if (element.id == targetPosition)
              {
                  ctx.fillStyle = "orange";
              }
              else
              {
                  ctx.fillStyle = "white";
              }
          }
          else
          {
              ctx.fillStyle = element.color;
          }
          ctx.fill();
      });
      if ((colorSwitch === "self") && (targetPosition > 0))
      {
          if(isFlying === false)
          {
              drawConnectionLine(getCoordsById(startPosition, starArray), getCoordsById(targetPosition, starArray), "orange", 0, 1)
              redrawFrontStars(getCoordsById(startPosition, starArray), getCoordsById(targetPosition, starArray), starArray); <!-- Sterne, die vor der Linie liegen, müssen nochmal gezeichnet werden -->
          }
          else
          {
              var elapsedTime = Date.now() - flightWatch;
              var flightTime = distanceArray(getCoordsById(startPosition, starArray), getCoordsById(targetPosition, starArray)) * flightFactor;
              var part = elapsedTime / flightTime;
              drawConnectionLine(getCoordsById(startPosition, starArray), getCoordsById(targetPosition, starArray), "green", 0, part)
              drawConnectionLine(getCoordsById(startPosition, starArray), getCoordsById(targetPosition, starArray), "orange", part, 1)
              redrawFrontStars(getCoordsById(startPosition, starArray), getCoordsById(targetPosition, starArray), starArray); <!-- Sterne, die vor der Linie liegen, müssen nochmal gezeichnet werden -->
          }
      }
  }

  function redrawFrontStars(pos1, pos2, starArray)
  {
      var lotFussPunktY;
      starArray.forEach(function(element)
      {
          var distanceFactor = distance(mapCenter, observerPos) / distance(element, observerPos); 
          if (element.id == startPosition)
          {
              if(pos2[1] > pos1[1])
              {
                  ctx.beginPath();
                  ctx.arc(element.x, element.z, element.size * distanceFactor, 0, 2 * Math.PI);
                  ctx.fillStyle = "green";
                  ctx.fill();
              }
          }
          else if (element.id == targetPosition)
          {
              if(pos1[1] > pos2[1])
              {
                  ctx.beginPath();
                  ctx.arc(element.x, element.z, element.size * distanceFactor, 0, 2 * Math.PI);
                  ctx.fillStyle = "orange";
                  ctx.fill();
              }
              ctx.fillStyle = "orange";
          }
          else
          {
              lotFussPunktY = pos1[1] + (pos2[1] - pos1[1]) * scalarProd(element.x - pos1[0], element.y - pos1[1], element.z - pos1[2], pos2[0] - pos1[0], pos2[1] - pos1[1], pos2[2] - pos1[2]) / absSquare(pos2[0] - pos1[0], pos2[1] - pos1[1], pos2[2] - pos1[2])
              if (lotFussPunktY > element.y)
              {
                  ctx.beginPath();
                  ctx.arc(element.x, element.z, element.size * distanceFactor, 0, 2 * Math.PI);
                  ctx.fillStyle = "white";
                  ctx.fill();
              }
          }
      });
  }

  function sortStars(starArray)
  {
      starArray.sort(function(a, b)
      {
          return b.y - a.y;
      });
  }

  function rotByAngle(starArray, rotAngle)
  {
      starArray.forEach(function(element)
      {
          var tempX = (element.x - galWidth/2) * Math.cos(rotAngle) + (element.y - galHeight/2) * Math.sin(rotAngle);
          var tempY = -1 * (element.x - galWidth/2) * Math.sin(rotAngle) + (element.y - galHeight/2) * Math.cos(rotAngle);
          element.x = tempX + galWidth/2;
          element.y = tempY + galHeight/2;
      });
  }

  function startRot(starArray)
  {
      if (isRotating === false)
      {
          rotTimer = setInterval(function()
          {
              rotByAngle(starArray, rotStepAngle);
              redrawMap(starArray, currentPlanet, targetPosition);
          }, updateTick);
          isRotating = true;
      }
  }

  function stopRot()
  {
      clearInterval(rotTimer);
      isRotating = false;
  }

  function fly(starArray)
  {
      if(isFlying === true)
      {
          alert("Du bist gerade im Flug!");
      }
      else
      {
          if((targetPosition > 0) && (targetPosition != startPosition))
          {
              var flightTime = calculateFlightTime(startPosition, targetPosition, starArray);
              isFlying = true;
              currentPlanet = 0;
              flightWatch = Date.now();
              updateFlightTimer = setInterval(function()
              {
                  redrawMap(starArray, currentPlanet, targetPosition)
              }, updateTick);
              flyTimer = setTimeout(function()
              {
                  startPosition = targetPosition;
                  currentPlanet = targetPosition;
                  targetPosition = 0;
                  isFlying = false;
                  clearInterval(updateFlightTimer);
                  redrawMap(starArray, currentPlanet, targetPosition);
              }, flightTime);
          }
          else
          {
              alert("Wähle zuerst ein Ziel aus!");
          }
      }
  }

  function calculateFlightTime(startPosition, targetPosition, starArray)
  {
      return distanceArray(getCoordsById(startPosition, starArray), getCoordsById(targetPosition, starArray)) * flightFactor;
  }

  function distance(pos1, pos2)
  {
      return Math.sqrt(Math.pow(pos1.x - pos2.x, 2) + Math.pow(pos1.y - pos2.y, 2) + Math.pow(pos1.z - pos2.z, 2));
  }

  function distanceArray(pos1, pos2)
  {
      return Math.sqrt(Math.pow(pos1[0] - pos2[0], 2) + Math.pow(pos1[1] - pos2[1], 2) + Math.pow(pos1[2] - pos2[2], 2));
  }

  function fractionColor(fractionName)
  {
      switch(fractionName)
      {
          case "Hornets":
              return "red";
          case "Kontarraner":
              return "purple";
          case "VfV":
              return "green";
          case "Catores":
              return "yellow";
          case "Prussianer":
              return "blue";
          case "Neutral":
              return "white";
          default:
              return "grey";
      }
  }

  function colorMode(mode, starArray)
  {
      switch(mode)
      {
          case 0:
              colorSwitch = "normal";
              break;
          case 1:
              colorSwitch = "fraction";
              break;
          case 2:
              colorSwitch = "self";
              break;
          default:
              break;
      }
      redrawMap(starArray, currentPlanet, targetPosition);
  }

  function drawConnectionLine(pos1, pos2, color, startPart, endPart)
  {
      ctx.beginPath();
      ctx.moveTo(parseInt(pos1[0]) + (pos2[0] - pos1[0]) * startPart, parseInt(pos1[2]) + (pos2[2] - pos1[2]) * startPart);
      ctx.lineTo(parseInt(pos1[0]) + (pos2[0] - pos1[0]) * endPart, parseInt(pos1[2]) + (pos2[2] - pos1[2]) * endPart);
      ctx.strokeStyle = color;
      ctx.stroke();
  }

  function getPlanetByCoords(xVal, zVal, starArray)
  {
      var planetId = 0;
      sortStars(starArray);
      starArray.forEach(function(element)
      {
          var distanceFactor = distance(mapCenter, observerPos) / distance(element, observerPos);
          if ((xVal >= (parseInt(element.x) - distanceFactor * element.size)) && (xVal <= (parseInt(element.x) + distanceFactor * element.size))
          && (zVal >= (parseInt(element.z) - distanceFactor * element.size)) && (zVal <= (parseInt(element.z) + distanceFactor * element.size)))
          {
              planetId = element.id;
          }
      });
      return planetId;
  }

  function getCoordsById(id, starArray)
  {
      var position = ["-1000", "-1000", "-1000"];
      starArray.forEach(function(element)
      {
          if (element.id == id)
          {
              position[0] = element.x;
              position[1] = element.y;
              position[2] = element.z;
          }
      });
      return position;
  }

  function scalarProd(x1, y1, z1, x2, y2, z2)
  {
      return x1 * x2 + y1 * y2 + z1 * z2;
  }

  function absSquare(x, y, z)
  {
      return scalarProd(x, y, z, x, y, z);
  }                                     
</script>