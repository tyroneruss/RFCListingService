# Read in date 
import sys
import os
import re
import CheckDupList
import CountyLookup
import shutil

from os import listdir
from os.path import isfile, join 

def title_except(s, exceptions):
   word_list = re.split(' ', s)       #re.split behaves as expected
   final = [word_list[0].capitalize()]
   for word in word_list[1:]:
      final.append(word in exceptions and word or word.capitalize())
   return " ".join(final)

def FindMRRecords(Month,filename,saledate1,saledate2):

	# Add records records by address
	outputfile = './build/' + Month + '/fc-final-' + Month + '.csv'	
	outfile = open(outputfile,'a+')

	with open(filename, "r") as datefile:
		data = datefile.read()  # Read the contents of the file into memory.
	datalist = data.splitlines()
	
	i = 0 
	count = 1
	list = []
	
	for line in datalist:
		if line.find(saledate1) > -1 or line.find(saledate2) > -1:
			list = line.split(',')
			Saledate = list[1]
			Street 	 = list[2].replace('\xa0','')
			County 	 = list[3]
			value = Saledate + ',' + Street

		if line.find(saledate1) < 0 and line.find(saledate2) < 0 and line.find('GA') > -1:
			list = line.split(',')	
			# print i,': ',list
			Address = list[2].split('GA')		
			city   = Address[0].rstrip()
			zip    = Address[1].lstrip()
			strRecord = value + ',' + city + ',GA,' +  zip  + ',Homeowner,' + County
			# print i,': ',strRecord
			outfile.write(strRecord + '\n')
			i = i + 1

			
	outfile.close()
	
	print " "
	return i
	
def main(argv):

	sum = 0	
	
	Month 	  = sys.argv[1]
	Saledate1 = sys.argv[2]	
	Saledate2 = sys.argv[3]	

	# Remove old build file
	outputfile = './build/' + Month + '/fc-final-' + Month + '.csv'	
	if os.path.exists(outputfile):
		os.remove(outputfile)

	directory = './build/' + Month 
	if not os.path.exists(directory):
		os.makedirs(directory)		
		
	print 'Processing build files'

	filename = './data/MCrecords-' + Month + '.csv'
	sum  =  FindMRRecords(Month,filename,Saledate1,Saledate2)

	print " "
	print '3 - MaCalla & Raymer '
	
	src  = './build/' + Month + '/fc-final-' + Month + '.csv'
	dest = '../Final-Build/' + Month + '/fc-final-'  + Month + '-03.csv'		
	shutil.copy2(src,dest) 
	
	reportfile = '../Final-Build/' + Month + '/FCreport.csv'
		# Add  row to final output
	rptfile = open(reportfile,'a')
	
	strRecord = 'McCall & Raymer|' + str(sum) + '|' + 'http://www.foreclosurehotline.net|'  + './3-McCallaRaymer/build/' + Month +  '/fc-final-' + Month + '.csv'
	rptfile.write(strRecord + '\n')
	
  	print "Total number of records found on the McCall & Raymer site: ", sum
	
# Initiate main program	
if __name__ == "__main__":
    main(sys.argv)

	
