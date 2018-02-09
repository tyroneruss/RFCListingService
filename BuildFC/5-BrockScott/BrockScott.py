# Read in date 
import sys
import os
import re
import shutil

def title_except(s, exceptions):
   word_list = re.split(' ', s)       #re.split behaves as expected
   final = [word_list[0].capitalize()]
   for word in word_list[1:]:
      final.append(word in exceptions and word or word.capitalize())
   
   return " ".join(final)
   
def SplitLocation(Location,StreetType):

	street = ''
	city   = ''
	
	for type in StreetType:
		if Location.find(type) > -1:
			address = Location.split(type)
			if len(address) > 1:
				street = address[0] + ' ' + type
				city   = address[1]
				if city.find('AKA') > -1:
					city = ''
				break;
		
	return street,city

def AddRecords(salemonth):

	StreetTypefile = 'data/StreetType.txt'	

	with open(StreetTypefile, "r") as datefile:
		data = datefile.read()  # Read the contents of the file into memory.
	typelist = data.splitlines()

	fclistpath = './data/' + salemonth + '/BrockScott.txt'

	# Build check for duplicate record in list 
	k=0
	i=0
	t=0
	
	# Remove dupliacte records by address
	filename = './build/' + salemonth + '/fc-final-' + salemonth + '.csv'
	outfile = open(filename,'w')

	count = 1
	county_num 	  = 2
	saledate_num  = 4
	with open(fclistpath) as infile:
		for line in infile:
			line = line.replace('\n','')
						
			if count == county_num:
				county_num = county_num + 15 
				county = line		
							
			# Saledate
			if count == saledate_num:
				datearray = line.split(' ')
				Saledate  = datearray[0]
				saledate_num = saledate_num + 15
				# print county,' ',Saledate
				
			if line.find('Georgia')  > -1:
				location = line.split(',')
				Address  = location[0]
				Zip		 = location[1].split(' ')
				 
				Street,City = SplitLocation(Address,typelist)			
				strRecord = Saledate + ',' + Street + ',' + City + ','  + ',GA,' + str(Zip[2]) + ',Homeowner,' + county + '\n'
				i = i + 1
				#print i,': ',strRecord
				outfile.write(strRecord)
				
				
			count = count + 1
	
	infile.close()
	outfile.close()	
	return i

def main(argv):

	# Read data from Aldp
	try:
	
		month  = sys.argv[1]
		sum = 0

		filename = './build/' + month + '/fc-final-' + month + '.csv'
		# Remove old build file
		if os.path.exists(filename):
			os.remove(filename)
		
		directory = './build/' + month 
		if not os.path.exists(directory):
			os.makedirs(directory)		
		
		sum = AddRecords(month)	
		print "5: Brack & Scoot"
		print ""
		print "The total number of records found on : ",sum


		src  = './build/' + month + '/fc-final-' + month + '.csv'
		dest = '../Final-Build/' + month + '/fc-final-' + month + '-05.csv'
			
		shutil.copy2(src,dest) 
		
		reportfile = '../Final-Build/' + month + '/FCreport.csv'
		# Add  row to final output
		rptfile = open(reportfile,'a')
		
		strRecord = 'Brack & Scott|' + str(sum) + '|https://www.brockandscott.com/BrockSearch.aspx|'+ './5-BrockScott/build/' + month +  '/fc-final-' + month + '.csv'
		rptfile.write(strRecord + '\n')
		rptfile.close()
	
	except ValueError:
		print "Oops!  That was not a valid URL.  Try again..."
		raise 
	
		
# Initiate main program	
if __name__ == "__main__":
    main(sys.argv)
