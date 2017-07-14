#!/usr/bin/env python

# CJohns
# March 2016
# get all of the teaching periods from now until the end of the school year, and store in to a database

def parse(mydate):
  #print(mydate)
  
  import urllib2
  try:
    #response = urllib2.urlopen('http://www.shpschedule.com')
    #response = urllib2.urlopen('http://web.shschools.org/index.php?'+mydate)
    response = urllib2.urlopen('http://65.49.38.77/index.php?'+mydate)
    #print(response.read())
  except:
    #print("dns issue")
    response = urllib2.urlopen('http://65.49.38.77/index.php?'+mydate)
  
  #print response.info()
  html = response.read()
  response.close()

  # remove header and footer code
  html = html.lower()
  dayOfTheWeek = html[html.find("<b>")+3:html.find(",")]
  tomorrow = html[:html.find("tomorrow")-2]
  tomorrow = tomorrow[tomorrow.rfind("?")+1:]

  html = html[html.find("/h2"):]
  html = html[html.find("/p")+3:]
  html = html[0:html.find("<a")-3]

  # identify each period
  periods = {"a":"","b":"","c":"","d":"","e":"","f":"","g":""}
  periods["date"]=mydate
  periods["first"]=""
  html = html.split("</p>")
  for period in html:
    period = period.strip("<p>")
    period = period.replace(" to "," ")
    period = period.replace(":","",1)
    period = period.split(" ")
    #print(period)
    if len(period)>1:
      if period[0] in "abcdefg":
        periods[period[0]]=period[1]+"-"+period[2]
        if periods["first"]=="":
          periods["first"]=period[0]
          
  #print(periods)
  query = "INSERT INTO `test`.`periods` (`date`, `a`, `b`, `c`, `d`, `e`, `f`, `g`, `first`) "
  query += "VALUES ('"+periods["date"]+"','"+periods["a"]+"','"+periods["b"]+"','"+periods["c"]+"','"+periods["d"]+"','"+periods["e"]+"','"+periods["f"]+"','"+periods["g"]+"','"+periods["first"]+"')"
  print(query)
  return (tomorrow)

def pickDates():
  #startDate=raw_input("start date mm-dd-yyyy:")
  #endDate=raw_input("end date mm-dd-yyyy:")
  startDate="1-01-2016" # the day of the month must be 2 digits
  endDate="6-03-2016"	# the day of the month must be 2 digits
  nextDate=parse(startDate)
  while nextDate!=endDate:
    nextDate=parse(nextDate)    
  nextDate=parse(nextDate)

if __name__ == "__main__":
  pickDates()
  #nextDate=parse("3-03-2016")
  