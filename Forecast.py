#!/usr/bin/env python
# coding: utf-8


get_ipython().system('pip install pyspark py4j')
get_ipython().system('pip install pyspark')



# Importing Libs

from __future__ import print_function
from pyspark.ml import Pipeline
from pyspark.ml.evaluation import RegressionEvaluator
from pyspark.ml.regression import DecisionTreeRegressor
from pyspark.sql import functions as F
from pyspark.sql.window import Window
from pyspark.sql import SparkSession



# Building spark session

spark = SparkSession         .builder         .appName("dccfinal")         .getOrCreate()

spark.conf.set('spark.sql.shuffle.partitions', 6) 
spark.conf.set('num-executors', 16)
spark



get_ipython().run_cell_magic('time', '', '\nlocation = \'reliance.csv\'\n\ndf = spark.read.format(\'csv\') \\\n.option("inferSchema",True) \\\n.option("header", True) \\\n.option("sep", \',\') \\\n.load(location)')



#df1 = spark.read.format("csv").option("header", "true").load("reliance.csv")





df.show()



import pandas as pd
import numpy as np
from pyspark.sql.functions import col
from datetime import datetime
from pyspark.sql.functions import col, udf
from pyspark.sql.types import DateType
from pyspark.sql.functions import col
from pyspark.sql.functions import expr
#data = df.withColumnRenamed('close','close')
#data.show()

data = df.withColumn('close',col('close').cast('double')).withColumn('open',col('open').cast('double')).withColumn("high",col("high").cast("double")).withColumn("low",col("low").cast("double"))


#data.na.fill(0,("close", "high", "low", "open")).show(False)


data.show()


data.describe()




from pyspark.ml.linalg import Vectors
from pyspark.ml.feature import VectorAssembler

Fassembler = VectorAssembler(inputCols=["open","high","low"], outputCol="Features")


output = Fassembler.transform(data)



output = Fassembler.setHandleInvalid("skip").transform(data).show
output



output.select("Features").show(5)



(train_data, test_data) = output.randomSplit([0.7, 0.3], seed=111)



train_data.show()



from pyspark.ml.regression import LinearRegression

regressor = LinearRegression(featuresCol='Features', labelCol="close")
regressor = regressor.fit(train_data)




#regressor.coefficients
#regressor.intercept



# Model Check

from pyspark.ml.evaluation import RegressionEvaluator

regression_evaluator = RegressionEvaluator(predictionCol = "prediction", labelCol = " close", metricName = "rmse")

rmse = regression_evaluator.evaluate(prediction)

print(f"RMSE is (rmse:1f)")


# Confirming Final Forcast Model



from pyspark.sql import Window
from pyspark.sql.functions import percent_rank	


df10 = output.withColumn("rank",percent_rank().over(Window.partitionBy().orderBy("date")))



df10.show()



train_df= df10.where("rank<=.8").drop("rank")
test_df= df10.where("rank>.8").drop("rank")




train_df.show()
test_df.show()




test_df.write.parquet("testdata1")




regressor = LinearRegression(featuresCol='Features', labelCol="close")


# In[ ]:


lr_model=regressor.fit(train_df)



lr_model.coefficients



lr_model.intercept



pred=lr_model.transform(test_df)
pred.show()


# In[ ]:


# Model Check

from pyspark.ml.evaluation import RegressionEvaluator

regression_evaluator = RegressionEvaluator(
    predictionCol = "prediction",
    labelCol = "close",
    metricName = "rmse")
rmse = regression_evaluator.evaluate(pred)
rmse




lr_model.save("stock_model1")




from pyspark.ml.regression import LinearRegressionModel
lrModel= LinearRegressionModel.load("/content/stock_model1")
final_output=lrModel.transform(test_df)
final_output.show()




import matplotlib.pyplot as plt
import pandas as pd





final_output_pd = final_output.toPandas()
final_output_pd=final_output_pd.set_index('date')
final_output_pd.head()



final_output_pd.plot.line(x='date', y='prediction')


# In[ ]:


import seaborn as sns




sns.set(rc = {'figure.figsize':(30,10)})

sns.lineplot(data=final_output_pd["prediction"])
sns.lineplot(data=final_output_pd["close"])





